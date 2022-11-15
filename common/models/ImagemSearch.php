<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Imagem;

/**
 * ImagemSearch represents the model behind the search form of `common\models\Imagem`.
 */
class ImagemSearch extends Imagem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idImagem', 'id_veiculo'], 'integer'],
            [['imagem'], 'safe'],
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
        $query = Imagem::find();

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
            'idImagem' => $this->idImagem,
            'id_veiculo' => $this->id_veiculo,
        ]);

        $query->andFilterWhere(['like', 'imagem', $this->imagem]);

        return $dataProvider;
    }
}
