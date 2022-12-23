<?php

namespace frontend\controllers;

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
        //ler as inputs do array post
        
        if ($this->request->isPost) {


            //verificar que campos estao preenchidos, caso nao estejam preenchidos o valor passa a null
            $condicoes = 0; //conta o nr de condicoes que o utilizador pesquisou

            if(\str_starts_with($this->request->post()['localizacao'], 'Selecione')){
                $localizacao = null;
            }else{
                $localizacao = $this->request->post()['localizacao'];
                
                //'localizacao_id' => $localizacao
            }

            if(\str_starts_with($this->request->post()['tipoVeiculo'], 'Selecione')){
                $tipoVeiculo = null;
            }else{
                $tipoVeiculo = $this->request->post()['tipoVeiculo'];
            }
            
            if($this->request->post()['dataInicio'] == ''){
                $dataInicio = null;
            }else{
                $dataInicio = $this->request->post()['dataInicio'];
            }

            if($this->request->post()['dataFim'] == ''){
                $dataFim = null;
            }else{
                $dataFim = $this->request->post()['dataFim'];
            }
                
                
            /*var_dump($localizacao);
            var_dump($tipoVeiculo);
            var_dump($dataInicio);
            var_dump($dataFim);
            var_dump($this->request->post());die;*/

            $model = Veiculo::find()->where()->andWhere()->all();
            //$veiculos = \common\models\Detalhesaluguer::find()->where(['profile_id' => Yii::$app->user->getId()])->one();
        } else {
            $model = Veiculo::find()->all();
        }

        return $this->render('index', [
            'model' => $model,
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
        $model = new Veiculo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_veiculo' => $model->id_veiculo]);
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
     * @param int $id_veiculo Id Veiculo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_veiculo)
    {
        $model = $this->findModel($id_veiculo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_veiculo' => $model->id_veiculo]);
        }

        return $this->render('update', [
            'model' => $model,
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
        $this->findModel($id_veiculo)->delete();

        return $this->redirect(['index']);
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
