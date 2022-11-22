<?php

namespace frontend\controllers;

use common\models\Analise;
use common\models\AnaliseSearch;
use common\models\Profile;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * AnaliseController implements the CRUD actions for Analise model.
 */
class AnaliseController extends Controller
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
     * Lists all Analise models.
     *
     * @return string
     */
    public function actionIndex($id_user)
    {
        $book = User::findOne($id_user);
        $dataProvider = new ActiveDataProvider([
            'query' => $book->getAnalises(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'book' => $book
        ]);


        /*$searchModel = new AnaliseSearch();
        $analise = Analise::find()->where(['id_user'=>$id_user])->all();
        //$dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'analise'=>$analise,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Analise model.
     * @param int $id_analise Id Analise
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_analise)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_analise),
        ]);
    }

    /**
     * Creates a new Analise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Analise();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_analise' => $model->id_analise]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Analise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_analise Id Analise
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_analise)
    {
        $model = $this->findModel($id_analise);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_analise' => $model->id_analise]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Analise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_analise Id Analise
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_analise)
    {
        $this->findModel($id_analise)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Analise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_analise Id Analise
     * @return Analise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_analise)
    {
        if (($model = Analise::findOne(['id_analise' => $id_analise])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
