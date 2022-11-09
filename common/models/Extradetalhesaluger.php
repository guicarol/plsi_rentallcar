<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "extradetalhesaluger".
 *
 * @property int $idExtra
 * @property int $idDetalhesAluger
 *
 * @property Detalhesaluger $idDetalhesAluger0
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
            [['idExtra', 'idDetalhesAluger'], 'required'],
            [['idExtra', 'idDetalhesAluger'], 'integer'],
            [['idExtra', 'idDetalhesAluger'], 'unique', 'targetAttribute' => ['idExtra', 'idDetalhesAluger']],
            [['idExtra'], 'exist', 'skipOnError' => true, 'targetClass' => Extra::class, 'targetAttribute' => ['idExtra' => 'idExtra']],
            [['idDetalhesAluger'], 'exist', 'skipOnError' => true, 'targetClass' => Detalhesaluger::class, 'targetAttribute' => ['idDetalhesAluger' => 'idDetalhesAluguer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idExtra' => 'Id Extra',
            'idDetalhesAluger' => 'Id Detalhes Aluger',
        ];
    }

    /**
     * Gets query for [[IdDetalhesAluger0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDetalhesAluger0()
    {
        return $this->hasOne(Detalhesaluger::class, ['idDetalhesAluguer' => 'idDetalhesAluger']);
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
