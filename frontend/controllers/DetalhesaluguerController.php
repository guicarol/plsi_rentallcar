<?php

namespace frontend\controllers;

use common\models\Detalhesaluguer;
use common\models\DetalhesaluguerSearch;
use common\models\ExtraDetalhesAluguer;
use common\models\Profile;
use common\models\Veiculo;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalhesaluguerController implements the CRUD actions for Detalhesaluguer model.
 */
class DetalhesaluguerController extends Controller
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
     * Lists all Detalhesaluguer models.
     *
     * @return string
     */
    public function actionIndex($id_user)
    {

        if (array_keys(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()))[0] == "cliente" && Yii::$app->user->id == $id_user) {

            $searchModel = new DetalhesaluguerSearch();
        $profile = Profile::findOne($id_user);
        $dataProvider = new ActiveDataProvider([
            'query' => $profile->getDetalhesAluguers(),
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'profile' => $profile

        ]);
        } else
            $this->redirect('index');

    }

    /**
     * Displays a single Detalhesaluguer model.
     * @param int $id_detalhes_aluguer Id Detalhes Aluguer
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_detalhes_aluguer)
    {

        $extra = \common\models\ExtraDetalhesAluguer::find()->where(['detalhes_aluguer_id'=>$id_detalhes_aluguer])->all();

        $model = $this->findModel($id_detalhes_aluguer);
        if (Yii::$app->user->id == $model->profile_id) {
            return $this->render('view', [
                'model' => $this->findModel($id_detalhes_aluguer),
                'extra'=>$extra,
            ]);
        } else
            $this->redirect('index');
    }


    /**
     * Creates a new Detalhesaluguer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id_veiculo)
    {
        $model = new Detalhesaluguer();
            //$dias = date_diff();
        $model->veiculo_id = $id_veiculo;
        $model->profile_id = Yii::$app->user->identity->getId();

        if ($this->request->isPost) {
            
            $model->extras = $this->request->post()['Detalhesaluguer']['extras'];
            if ($model->load($this->request->post())) {
                //calculo da diferenca entre a data de inicio e a data de fim
                $dataIni = date_create($model->data_inicio);
                $dataFim = date_create($model->data_fim);
                $dataDiff = date_diff($dataIni, $dataFim);
                //var_dump($dataDiff->format("%a"));die;

                $model->preco_total = 30;

                if ($model->save()) {
                    if ($model->extras != null)
                        foreach ($model->extras as $extradetalhes) {
                            $extradetalhesaluguer = new ExtraDetalhesAluguer();
                            $extradetalhesaluguer->extra_id = $extradetalhes;
                            $extradetalhesaluguer->detalhes_aluguer_id = $model->id_detalhes_aluguer;
                            $extradetalhesaluguer->save();
                        }

                    return $this->redirect(['view', 'id_detalhes_aluguer' => $model->id_detalhes_aluguer]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Detalhesaluguer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_detalhes_aluguer Id Detalhes Aluguer
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionUpdate($id_detalhes_aluguer)
    {
        $model = $this->findModel($id_detalhes_aluguer);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_detalhes_aluguer' => $model->id_detalhes_aluguer]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detalhesaluguer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_detalhes_aluguer Id Detalhes Aluguer
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id_detalhes_aluguer)
    {
        $this->findModel($id_detalhes_aluguer)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detalhesaluguer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_detalhes_aluguer Id Detalhes Aluguer
     * @return Detalhesaluguer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id_detalhes_aluguer)
    {
        if (($model = Detalhesaluguer::findOne(['id_detalhes_aluguer' => $id_detalhes_aluguer])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
