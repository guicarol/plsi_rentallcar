<?php

namespace backend\controllers;

use common\models\Extra;
use common\models\ExtraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExtraController implements the CRUD actions for Extra model.
 */
class ExtraController extends Controller
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
     * Lists all Extra models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExtraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Extra model.
     * @param int $id_extra Id Extra
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_extra)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_extra),
        ]);
    }

    /**
     * Creates a new Extra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Extra();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_extra' => $model->id_extra]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Extra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_extra Id Extra
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_extra)
    {
        $model = $this->findModel($id_extra);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_extra' => $model->id_extra]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Extra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_extra Id Extra
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_extra)
    {
        $this->findModel($id_extra)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Extra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_extra Id Extra
     * @return Extra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_extra)
    {
        if (($model = Extra::findOne(['id_extra' => $id_extra])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
