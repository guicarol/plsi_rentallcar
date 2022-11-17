<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fatura".
 *
 * @property int $id_fFatura
 * @property string|null $data_fatura
 * @property float $preco_total
 */
class Fatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_fatura'], 'safe'],
            [['preco_total'], 'required'],
            [['preco_total'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fFatura' => 'Id F Fatura',
            'data_fatura' => 'Data Fatura',
            'preco_total' => 'Preco Total',
        ];
    }
}
