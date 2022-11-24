<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linha_fatura".
 *
 * @property int $id_linha_fatura
 * @property int $fatura_id
 * @property int $extra_detalhes_aluguer_id
 *
 * @property ExtraDetalhesAluguer $extraDetalhesAluguer
 * @property Fatura $fatura
 */
class Linhafatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linha_fatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fatura_id', 'extra_detalhes_aluguer_id'], 'required'],
            [['fatura_id', 'extra_detalhes_aluguer_id'], 'integer'],
            [['extra_detalhes_aluguer_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExtraDetalhesAluguer::class, 'targetAttribute' => ['extra_detalhes_aluguer_id' => 'id_extra_detalhes_aluguer']],
            [['fatura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::class, 'targetAttribute' => ['fatura_id' => 'id_fatura']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_linha_fatura' => 'Id Linha Fatura',
            'fatura_id' => 'Fatura ID',
            'extra_detalhes_aluguer_id' => 'Extra Detalhes Aluguer ID',
        ];
    }

    /**
     * Gets query for [[ExtraDetalhesAluguer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraDetalhesAluguer()
    {
        return $this->hasOne(ExtraDetalhesAluguer::class, ['id_extra_detalhes_aluguer' => 'extra_detalhes_aluguer_id']);
    }

    /**
     * Gets query for [[Fatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFatura()
    {
        return $this->hasOne(Fatura::class, ['id_fatura' => 'fatura_id']);
    }
}
