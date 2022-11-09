<?php

namespace backend\controllers;

use common\models\Seguro;
use common\models\SeguroSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeguroController implements the CRUD actions for Seguro model.
 */
class SeguroController extends Controller
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
     * Lists all Seguro models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SeguroSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seguro model.
     * @param int $idSeguro Id Seguro
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSeguro)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSeguro),
        ]);
    }

    /**
     * Creates a new Seguro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Seguro();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idSeguro' => $model->idSeguro]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seguro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idSeguro Id Seguro
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSeguro)
    {
        $model = $this->findModel($idSeguro);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSeguro' => $model->idSeguro]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Seguro model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idSeguro Id Seguro
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSeguro)
    {
        $this->findModel($idSeguro)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seguro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idSeguro Id Seguro
     * @return Seguro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSeguro)
    {
        if (($model = Seguro::findOne(['idSeguro' => $idSeguro])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
