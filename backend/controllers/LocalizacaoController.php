<?php

namespace backend\controllers;

use common\models\Localizacao;
use common\models\LocalizacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocalizacaoController implements the CRUD actions for Localizacao model.
 */
class LocalizacaoController extends Controller
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
     * Lists all Localizacao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LocalizacaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Localizacao model.
     * @param int $idLocalizacao Id Localizacao
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLocalizacao)
    {
        return $this->render('view', [
            'model' => $this->findModel($idLocalizacao),
        ]);
    }

    /**
     * Creates a new Localizacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Localizacao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idLocalizacao' => $model->idLocalizacao]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Localizacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idLocalizacao Id Localizacao
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLocalizacao)
    {
        $model = $this->findModel($idLocalizacao);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLocalizacao' => $model->idLocalizacao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Localizacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLocalizacao Id Localizacao
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLocalizacao)
    {
        $this->findModel($idLocalizacao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Localizacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLocalizacao Id Localizacao
     * @return Localizacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLocalizacao)
    {
        if (($model = Localizacao::findOne(['idLocalizacao' => $idLocalizacao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}