<?php

namespace frontend\controllers;

use common\models\Linhafatura;
use common\models\LinhafaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhafaturaController implements the CRUD actions for Linhafatura model.
 */
class LinhafaturaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Linhafatura models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LinhafaturaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Linhafatura model.
     * @param int $id_linha_fatura Id Linha Fatura
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_linha_fatura)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_linha_fatura),
        ]);
    }

    /**
     * Creates a new Linhafatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Linhafatura();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_linha_fatura' => $model->id_linha_fatura]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Linhafatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_linha_fatura Id Linha Fatura
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_linha_fatura)
    {
        $model = $this->findModel($id_linha_fatura);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_linha_fatura' => $model->id_linha_fatura]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Linhafatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_linha_fatura Id Linha Fatura
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_linha_fatura)
    {
        $this->findModel($id_linha_fatura)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Linhafatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_linha_fatura Id Linha Fatura
     * @return Linhafatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_linha_fatura)
    {
        if (($model = Linhafatura::findOne(['id_linha_fatura' => $id_linha_fatura])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
