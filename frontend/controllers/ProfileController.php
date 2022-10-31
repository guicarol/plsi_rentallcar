<?php

namespace frontend\controllers;

use common\models\Profile;
use common\models\ProfileSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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

                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'view', 'create', 'delete'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => [ 'view', 'create', 'delete'],
                            'roles' => ['cliente'],
                        ],
                    ],
                ],
            ],
        );
    }

    /**
     * Lists all Profile models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param int $idProfile Id Profile
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idProfile)
    {
        if (array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()))[0] == "cliente" && Yii::$app->user->id == $idProfile) {
            return $this->render('view', [
                'model' => $this->findModel($idProfile),
            ]);
        } elseif (array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()))[0] == "admin") {
            return $this->render('view', ['model' => $this->findModel($idProfile),
            ]);
        } else
            $this->redirect('index');

    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profile();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idProfile' => $model->idProfile]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idProfile Id Profile
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idProfile)
    {
        $model = $this->findModel($idProfile);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idProfile' => $model->idProfile]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idProfile Id Profile
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idProfile)
    {
        $this->findModel($idProfile)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idProfile Id Profile
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idProfile)
    {
        if (($model = Profile::findOne(['idProfile' => $idProfile])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
