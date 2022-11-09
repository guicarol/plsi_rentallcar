<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localizacao".
 *
 * @property int $idLocalizacao
 * @property string $morada
 * @property string $codPostal
 *
 * @property Detalhesaluger[] $detalhesalugers
 * @property Detalhesaluger[] $detalhesalugers0
 */
class Localizacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localizacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['morada', 'codPostal'], 'required'],
            [['morada'], 'string', 'max' => 51],
            [['codPostal'], 'string', 'max' => 9],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLocalizacao' => 'Id Localizacao',
            'morada' => 'Morada',
            'codPostal' => 'Cod Postal',
        ];
    }

    /**
     * Gets query for [[Detalhesalugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesalugers()
    {
        return $this->hasMany(Detalhesaluger::class, ['idLocalizacaoLevantamento' => 'idLocalizacao']);
    }

    /**
     * Gets query for [[Detalhesalugers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesalugers0()
    {
        return $this->hasMany(Detalhesaluger::class, ['idLocalizacaoDevolucao' => 'idLocalizacao']);
    }
}
