<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Seguro;

/**
 * SeguroSearch represents the model behind the search form of `common\models\Seguro`.
 */
class SeguroSearch extends Seguro
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSeguro'], 'integer'],
            [['marca', 'cobertura'], 'safe'],
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
        $query = Seguro::find();

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
            'idSeguro' => $this->idSeguro,
            'preco' => $this->preco,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'cobertura', $this->cobertura]);

        return $dataProvider;
    }
}
