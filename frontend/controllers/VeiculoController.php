<?php

namespace frontend\controllers;

use common\models\Veiculo;
use common\models\VeiculoSearch;
use common\models\Detalhesaluguer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\db\conditions\BetweenColumnsCondition;

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
        $this->layout = 'main_index.php';

        //ler as inputs do array post
        
        if ($this->request->isPost) {

            if(\str_starts_with($this->request->post()['localizacao'], 'Selecione')){
                $localizacao = '%%';
            }else{
                $localizacao = $this->request->post()['localizacao'];
            }

            if(\str_starts_with($this->request->post()['tipoVeiculo'], 'Selecione')){
                $tipoVeiculo = '%%';
            }else{
                $tipoVeiculo = $this->request->post()['tipoVeiculo'];
            }
            
            if($this->request->post()['dataInicio'] == ''){
                $dataInicio = '';
            }else{
                $dataInicio = $this->request->post()['dataInicio'];
            }

            if($this->request->post()['dataFim'] == ''){
                $dataFim = '';
            }else{
                $dataFim = $this->request->post()['dataFim'];
            }
            
           /* $subquery = Detalhesaluguer::find()
                ->select(['veiculo_id'])
                    ->where(new BetweenColumnsCondition($dataInicio, 'between', 'detalhes_aluguer.data_inicio', 'detalhes_aluguer.data_fim'))
                    ->orWhere(new BetweenColumnsCondition($dataFim, 'between', 'detalhes_aluguer.data_inicio', 'detalhes_aluguer.data_fim'))
                    ->orWhere(['between', 'detalhes_aluguer.data_inicio', $dataInicio, $dataFim])
                    ->orWhere(['between', 'detalhes_aluguer.data_fim', $dataInicio, $dataFim])
                    ->all();

            $carro = array();
            foreach($subquery as $item){
                $carro[] = $item->veiculo_id;
            }

            $model = Veiculo::find()
                ->innerJoinWith(['tipoVeiculo'])
                ->joinWith(['localizacao'])
                ->joinWith(['detalhesAluguers'])
                    ->where(['like', 'tipo_veiculo.categoria', $tipoVeiculo])
                    ->andWhere(['not like', 'veiculo.estado', 'manutencao'])
                    ->andWhere(['like', 'localizacao.morada', $localizacao])

                    ->andWhere(['or', 
                        [new BetweenColumnsCondition($dataInicio, 'not between', 'detalhes_aluguer.data_inicio', 'detalhes_aluguer.data_fim')], 
                        ['is', 'detalhes_aluguer.data_fim', null]
                    ])

                    ->andWhere([ 
                        ['is', 'detalhes_aluguer.data_fim', null],'or',
                        [new BetweenColumnsCondition($dataInicio, 'not between', 'detalhes_aluguer.data_inicio', 'detalhes_aluguer.data_fim')]
                    ])

                    //->andWhere(new BetweenColumnsCondition($dataInicio, 'not between', 'detalhes_aluguer.data_inicio', 'detalhes_aluguer.data_fim'))
                    //->orWhere(['is', 'detalhes_aluguer.data_fim', null])

                    //->andWhere(new BetweenColumnsCondition($dataInicio, 'not between', 'detalhes_aluguer.data_inicio', 'detalhes_aluguer.data_fim'))
                    //->andWhere(new BetweenColumnsCondition($dataFim, 'not between', 'detalhes_aluguer.data_inicio', 'detalhes_aluguer.data_fim'))
                    ->andWhere(['not in', 'detalhes_aluguer.veiculo_id', $carro])
                    ->all();*/
            
            //var_dump($subquery->createCommand()->getRawSql());
            //var_dump($model->createCommand()->getRawSql());



            $connection = \Yii::$app->getDb();

            $command = $connection->createCommand(
                "select distinct id_veiculo from veiculo 
                    inner join tipo_veiculo on tipo_veiculo.id_tipo_veiculo = veiculo.tipo_veiculo_id 
                    left join localizacao on localizacao.id_localizacao = veiculo.localizacao_id
                    left join detalhes_aluguer on detalhes_aluguer.veiculo_id = veiculo.id_veiculo 
                    where tipo_veiculo.categoria like :tipo
                        and localizacao.morada like :morada
                        and veiculo.estado not like 'manutencao'
                        and (:dataIni  not between detalhes_aluguer.data_inicio and detalhes_aluguer.data_fim or detalhes_aluguer.data_inicio is null)
                        and (:dataFim not between detalhes_aluguer.data_inicio and detalhes_aluguer.data_fim or detalhes_aluguer.data_inicio is null)
                        and veiculo.id_veiculo not in (
                            select veiculo_id from detalhes_aluguer
                                where (:dataIni   between detalhes_aluguer.data_inicio and detalhes_aluguer.data_fim 
                                    or :dataFim  between detalhes_aluguer.data_inicio and detalhes_aluguer.data_fim )
                                    or detalhes_aluguer.data_inicio between :dataIni and :dataFim
                                    or detalhes_aluguer.data_fim between :dataIni  and :dataFim);"
                    )
                    ->bindValue(':tipo', $tipoVeiculo)
                    ->bindValue(':morada', $localizacao)
                    ->bindValue(':dataIni', $dataInicio)
                    ->bindValue(':dataFim', $dataFim);


            $result = $command->queryAll();
            
            //return json_encode($command->getRawSql());
            //var_dump($result);
            $carros = array();
            
            foreach ($result as $key) {
                $carros[] = Veiculo::find()->where(['id_veiculo' => $key['id_veiculo']])->one();
            }
            
            //var_dump($carros);die;
            
                
            //$model = Veiculo::find()->where()->andWhere()->all(); 
            //$veiculos = \common\models\Detalhesaluguer::find()->where(['profile_id' => Yii::$app->user->getId()])->one();

            $model = $carros;
        } else {
            $model = Veiculo::find()
                ->andWhere(['not like','veiculo.estado','manutencao'])
                ->all();
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
