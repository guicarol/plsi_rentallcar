<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Veiculo;

/**
 * VeiculoSearch represents the model behind the search form of `common\models\Veiculo`.
 */
class VeiculoSearch extends Veiculo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_veiculo', 'tipo_veiculo_id', 'localizacao_id', 'franquia'], 'integer'],
            [['marca', 'modelo', 'combustivel', 'matricula', 'descricao', 'estado', 'franquia'], 'safe'],
            [['preco'], 'number'],
            [['tipoVeiculos'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Veiculo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        
        if($this->tipoVeiculos){
            $query->join('INNER JOIN','tipo_veiculo','tipo_veiculo.id_tipo_veiculo = tipo_veiculo_id')
            ->andFilterWhere(['veiculo.tipo_veiculo_id' => $this->tipoVeiculos]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_veiculo' => $this->id_veiculo,
            'preco' => $this->preco,
            'tipo_veiculo_id' => $this->tipo_veiculo_id,
            'localizacao_id' => $this->localizacao_id,
            'franquia' => $this->franquia,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'combustivel', $this->combustivel])
            ->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
