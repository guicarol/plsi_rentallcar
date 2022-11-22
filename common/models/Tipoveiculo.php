<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_veiculo".
 *
 * @property int $id_tipo_veiculo
 * @property string $categoria
 *
 * @property Veiculo[] $veiculos
 */
class TipoVeiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_veiculo';
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
            'id_tipo_veiculo' => 'Id Tipo Veiculo',
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
        return $this->hasMany(Veiculo::class, ['tipo_veiculo_id' => 'id_tipo_veiculo']);
    }
}
