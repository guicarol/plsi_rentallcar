<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "localizacao".
 *
 * @property int $id_localizacao
 * @property string $morada
 * @property string $cod_postal
 *
 * @property DetalhesAluger[] $detalhesAlugers
 * @property DetalhesAluger[] $detalhesAlugers0
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
            [['morada', 'cod_postal'], 'required'],
            [['morada'], 'string', 'max' => 51],
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
        return $this->hasMany(DetalhesAluger::class, ['id_localizacao_levantamento' => 'id_localizacao']);
    }

    /**
     * Gets query for [[DetalhesAlugers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAlugers0()
    {
        return $this->hasMany(DetalhesAluger::class, ['id_localizacao_devolucao' => 'id_localizacao']);
    }
}
