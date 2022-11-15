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
            [['idVeiculo', 'tipoVeiculo'], 'integer'],
            [['marca', 'modelo', 'combustivel', 'matricula', 'descricao'], 'safe'],
            [['preco'], 'number'],
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

        // grid filtering conditions
        $query->andFilterWhere([
            'idVeiculo' => $this->idVeiculo,
            'preco' => $this->preco,
            'tipoVeiculo' => $this->tipoVeiculo,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'combustivel', $this->combustivel])
            ->andFilterWhere(['like', 'matricula', $this->matricula])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
