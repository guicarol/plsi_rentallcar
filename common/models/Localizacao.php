<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localizacao".
 *
 * @property int $id_localizacao
 * @property string $localizacao
 * @property string $morada
 * @property string $cod_postal
 *
 * @property DetalhesAluger[] $detalhesAlugers
 * @property DetalhesAluger[] $detalhesAlugers0
 * @property Veiculo[] $veiculos
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
            [['localizacao', 'morada', 'cod_postal'], 'required'],
            [['localizacao'], 'string', 'max' => 51],
            [['morada'], 'string', 'max' => 71],
            [['cod_postal'], 'string', 'max' => 9],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_localizacao' => 'Id Localizacao',
            'localizacao' => 'Localizacao',
            'morada' => 'Morada',
            'cod_postal' => 'Cod Postal',
        ];
    }

    /**
     * Gets query for [[DetalhesAlugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAlugers()
    {
        return $this->hasMany(DetalhesAluger::class, ['localizacao_levantamento_id' => 'id_localizacao']);
    }

    /**
     * Gets query for [[DetalhesAlugers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAlugers0()
    {
        return $this->hasMany(DetalhesAluger::class, ['localizacao_devolucao_id' => 'id_localizacao']);
    }

    /**
     * Gets query for [[Veiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculos()
    {
        return $this->hasMany(Veiculo::class, ['localizacao_id' => 'id_localizacao']);
    }
}
