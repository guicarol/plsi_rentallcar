<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seguro".
 *
 * @property int $idSeguro
 * @property string $marca
 * @property string $cobertura
 * @property float $preco
 *
 * @property Detalhesaluger[] $detalhesalugers
 */
class Seguro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seguro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marca', 'cobertura', 'preco'], 'required'],
            [['preco'], 'number'],
            [['marca'], 'string', 'max' => 51],
            [['cobertura'], 'string', 'max' => 81],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSeguro' => 'Id Seguro',
            'marca' => 'Marca',
            'cobertura' => 'Cobertura',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[Detalhesalugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesalugers()
    {
        return $this->hasMany(Detalhesaluger::class, ['idSeguro' => 'idSeguro']);
    }
}
