<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "extra_detalhes_aluger".
 *
 * @property int $id_extra
 * @property int $id_detalhes_aluger
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
            [['id_extra', 'id_detalhes_aluger'], 'required'],
            [['id_extra', 'id_detalhes_aluger'], 'integer'],
            [['id_extra', 'id_detalhes_aluger'], 'unique', 'targetAttribute' => ['id_extra', 'id_detalhes_aluger']],
            [['id_extra'], 'exist', 'skipOnError' => true, 'targetClass' => Extra::class, 'targetAttribute' => ['id_extra' => 'id_extra']],
            [['id_detalhes_aluger'], 'exist', 'skipOnError' => true, 'targetClass' => DetalhesAluger::class, 'targetAttribute' => ['id_detalhes_aluger' => 'id_detalhes_aluguer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_extra' => 'Id Extra',
            'id_detalhes_aluger' => 'Id Detalhes Aluger',
        ];
    }

    /**
     * Gets query for [[DetalhesAluger]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAluger()
    {
        return $this->hasOne(DetalhesAluger::class, ['id_detalhes_aluguer' => 'id_detalhes_aluger']);
    }

    /**
     * Gets query for [[Extra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtra()
    {
        return $this->hasOne(Extra::class, ['id_extra' => 'id_extra']);
    }
}
