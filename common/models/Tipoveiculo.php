<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipoveiculo".
 *
 * @property int $idTipoVeiculo
 * @property string $categoria
 *
 * @property Veiculo[] $veiculos
 */
class Tipoveiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoveiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria'], 'required'],
            [['categoria'], 'string', 'max' => 21],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipoVeiculo' => 'Id Tipo Veiculo',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[Veiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculos()
    {
        return $this->hasMany(Veiculo::class, ['idTipoVeiculo' => 'idTipoVeiculo']);
    }
}
