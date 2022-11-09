<?php

namespace backend\controllers;

use common\models\Veiculo;
use common\models\VeiculoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VeiculoController implements the CRUD actions for Veiculo model.
 */
class VeiculoController extends Controller
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
     * Lists all Veiculo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VeiculoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Veiculo model.
     * @param int $idVeiculo Id Veiculo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idVeiculo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idVeiculo),
        ]);
    }

    /**
     * Creates a new Veiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Veiculo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idVeiculo' => $model->idVeiculo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Veiculo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idVeiculo Id Veiculo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idVeiculo)
    {
        $model = $this->findModel($idVeiculo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idVeiculo' => $model->idVeiculo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Veiculo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idVeiculo Id Veiculo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idVeiculo)
    {
        $this->findModel($idVeiculo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Veiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idVeiculo Id Veiculo
     * @return Veiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idVeiculo)
    {
        if (($model = Veiculo::findOne(['idVeiculo' => $idVeiculo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
