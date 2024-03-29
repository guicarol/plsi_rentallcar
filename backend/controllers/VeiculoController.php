<?php

namespace backend\controllers;

use common\models\Imagem;
use common\models\Veiculo;
use common\models\VeiculoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;


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
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['index', 'view','update','updateestado', 'create', 'delete'],
                            'allow' => true,
                            'roles' => ['gestor','admin'],
                        ],
                    ],
                    'denyCallback' => function ($rule, $action) {
                        Yii::$app->user->logout();
                        return $this->redirect(['site/login']);
                    }
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
        $tipoVeiculos = \yii\helpers\ArrayHelper::map(\common\models\TipoVeiculo::find()->asArray()->all(), 'id_tipo_veiculo', 'categoria');

        $searchModel = new VeiculoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        //var_dump(array_keys(Yii::$app->authManager->getRolesByUser(2))[0]); die;


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tipoVeiculos'=>$tipoVeiculos,
        ]);
    }

    /**
     * Displays a single Veiculo model.
     * @param int $id_veiculo Id Veiculo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_veiculo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_veiculo),
        ]);
    }

    /**
     * Creates a new Veiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->can('createVeiculo')){

            $model = new Veiculo();
            $modelupload = new UploadForm();

            if ($this->request->isPost) {

                if ($model->load($this->request->post()) && $modelupload->load($this->request->post())) {

                    if ($model->save()) {

                        $modelupload->imageFiles = UploadedFile::getInstances($modelupload, 'imageFiles');
                        $modelupload->upload();

                        foreach ($modelupload->imageFiles as $image) {

                            $modelimage = new Imagem();
                            $modelimage->imagem = $image->baseName . '.' . $image->extension;
                            $modelimage->veiculo_id = $model->id_veiculo;
                            $modelimage->save();
                        }


                        return $this->redirect(['view', 'id_veiculo' => $model->id_veiculo]);
                    }
                }
            } else {
                $model->loadDefaultValues();
                return $this->render('create', [
                    'model' => $model,
                    'modelupload' => $modelupload,
                ]);

            }



        }else{
            Yii::$app->user->logout();
            return  $this ->redirect(['site/login']);
        }
    }

    /**
     * Updates an existing Veiculo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_veiculo Id Veiculo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_veiculo)
    {
        if (\Yii::$app->user->can('updateVeiculo')) {
            $model = $this->findModel($id_veiculo);
            $modelupload = new UploadForm();

            if ($model->load($this->request->post()) && $modelupload->load($this->request->post())) {
                if ($model->save()) {

                    $modelupload->imageFiles = UploadedFile::getInstances($modelupload, 'imageFiles');
                    $modelupload->upload();

                    foreach ($modelupload->imageFiles as $image) {

                        $modelimage = new Imagem();
                        $modelimage->imagem = $image->baseName . '.' . $image->extension;
                        $modelimage->veiculo_id = $model->id_veiculo;
                        $modelimage->save();
                    }


                    return $this->redirect(['view', 'id_veiculo' => $model->id_veiculo]);
                }
            }else{
                return $this->render('update', [
                    'model' => $model,
                    'modelupload' => $modelupload,
                ]);
            }

        }else {
            Yii::$app->user->logout();
            return  $this ->redirect(['site/login']);
        }
    }
    public function actionUpdateestado($id_veiculo)
    {
        $model = $this->findModel($id_veiculo);

        if ($model->estado=='manutencao') {

            $model->estado='pronto';
        } else{

            $model->estado='manutencao';

        }
        $model->save();
        return $this->render('view', [
            'model' => $this->findModel($id_veiculo),
        ]);
    }
    /**
     * Deletes an existing Veiculo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_veiculo Id Veiculo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_veiculo)
    {

        if (\Yii::$app->user->can('deleteVeiculo')) {
            $this->findModel($id_veiculo)->delete();
        }

        else {
            Yii::$app->user->logout();
            return  $this ->redirect(['site/login']);
        }
    }

    /**
     * Finds the Veiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_veiculo Id Veiculo
     * @return Veiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_veiculo)
    {
        if (($model = Veiculo::findOne(['id_veiculo' => $id_veiculo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
