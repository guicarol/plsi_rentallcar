<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "extradetalhesaluger".
 *
 * @property int $idExtra
 * @property int $id_detalhesAluger
 *
 * @property Detalhesaluger $detalhesAluger
 * @property Extra $idExtra0
 */
class Extradetalhesaluger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extradetalhesaluger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idExtra', 'id_detalhesAluger'], 'required'],
            [['idExtra', 'id_detalhesAluger'], 'integer'],
            [['idExtra', 'id_detalhesAluger'], 'unique', 'targetAttribute' => ['idExtra', 'id_detalhesAluger']],
            [['idExtra'], 'exist', 'skipOnError' => true, 'targetClass' => Extra::class, 'targetAttribute' => ['idExtra' => 'idExtra']],
            [['id_detalhesAluger'], 'exist', 'skipOnError' => true, 'targetClass' => Detalhesaluger::class, 'targetAttribute' => ['id_detalhesAluger' => 'idDetalhesAluguer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idExtra' => 'Id Extra',
            'id_detalhesAluger' => 'Id Detalhes Aluger',
        ];
    }

    /**
     * Gets query for [[DetalhesAluger]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAluger()
    {
        return $this->hasOne(Detalhesaluger::class, ['idDetalhesAluguer' => 'id_detalhesAluger']);
    }

    /**
     * Gets query for [[IdExtra0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdExtra0()
    {
        return $this->hasOne(Extra::class, ['idExtra' => 'idExtra']);
    }
}
