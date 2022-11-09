<?php

namespace backend\controllers;

use common\models\TipoVeiculo;
use common\models\TipoVeiculoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoVeiculoController implements the CRUD actions for TipoVeiculo model.
 */
class TipoVeiculoController extends Controller
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
     * Lists all TipoVeiculo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoVeiculoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoVeiculo model.
     * @param int $idTipoVeiculo Id Tipo Veiculo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTipoVeiculo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTipoVeiculo),
        ]);
    }

    /**
     * Creates a new TipoVeiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoVeiculo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTipoVeiculo' => $model->idTipoVeiculo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoVeiculo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTipoVeiculo Id Tipo Veiculo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTipoVeiculo)
    {
        $model = $this->findModel($idTipoVeiculo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTipoVeiculo' => $model->idTipoVeiculo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoVeiculo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTipoVeiculo Id Tipo Veiculo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTipoVeiculo)
    {
        $this->findModel($idTipoVeiculo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoVeiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTipoVeiculo Id Tipo Veiculo
     * @return TipoVeiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTipoVeiculo)
    {
        if (($model = TipoVeiculo::findOne(['idTipoVeiculo' => $idTipoVeiculo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
