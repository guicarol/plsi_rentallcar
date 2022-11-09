<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "extra".
 *
 * @property int $idExtra
 * @property string $descricao
 * @property float $preco
 *
 * @property Extradetalhesaluger[] $extradetalhesalugers
 * @property Detalhesaluger[] $idDetalhesAlugers
 */
class Extra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'preco'], 'required'],
            [['preco'], 'number'],
            [['descricao'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idExtra' => 'Id Extra',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[Extradetalhesalugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtradetalhesalugers()
    {
        return $this->hasMany(Extradetalhesaluger::class, ['idExtra' => 'idExtra']);
    }

    /**
     * Gets query for [[IdDetalhesAlugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDetalhesAlugers()
    {
        return $this->hasMany(Detalhesaluger::class, ['idDetalhesAluguer' => 'idDetalhesAluger'])->viaTable('extradetalhesaluger', ['idExtra' => 'idExtra']);
    }
}
