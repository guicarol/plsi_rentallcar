<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fatura".
 *
 * @property int $idFatura
 * @property string|null $dataFatura
 * @property float $precoTotal
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
            [['dataFatura'], 'safe'],
            [['precoTotal'], 'required'],
            [['precoTotal'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFatura' => 'Id Fatura',
            'dataFatura' => 'Data Fatura',
            'precoTotal' => 'Preco Total',
        ];
    }
}
