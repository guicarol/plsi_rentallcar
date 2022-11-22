<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "extra_detalhes_aluger".
 *
 * @property int $extra_id
 * @property int $detalhes_aluger_id
 *
 * @property DetalhesAluger $detalhesAluger
 * @property Extra $extra
 */
class ExtraDetalhesAluger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extra_detalhes_aluger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['extra_id', 'detalhes_aluger_id'], 'required'],
            [['extra_id', 'detalhes_aluger_id'], 'integer'],
            [['extra_id', 'detalhes_aluger_id'], 'unique', 'targetAttribute' => ['extra_id', 'detalhes_aluger_id']],
            [['extra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Extra::class, 'targetAttribute' => ['extra_id' => 'id_extra']],
            [['detalhes_aluger_id'], 'exist', 'skipOnError' => true, 'targetClass' => DetalhesAluger::class, 'targetAttribute' => ['detalhes_aluger_id' => 'id_detalhes_aluguer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'extra_id' => 'Extra ID',
            'detalhes_aluger_id' => 'Detalhes Aluger ID',
        ];
    }

    /**
     * Gets query for [[DetalhesAluger]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAluger()
    {
        return $this->hasOne(DetalhesAluger::class, ['id_detalhes_aluguer' => 'detalhes_aluger_id']);
    }

    /**
     * Gets query for [[Extra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtra()
    {
        return $this->hasOne(Extra::class, ['id_extra' => 'extra_id']);
    }
}
