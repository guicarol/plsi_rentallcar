<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "extra".
 *
 * @property int $id_extra
 * @property string $descricao
 * @property float $preco
 *
 * @property DetalhesAluger[] $detalhesAlugers
 * @property ExtraDetalhesAluger[] $extraDetalhesAlugers
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
            'id_extra' => 'Id Extra',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[DetalhesAlugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAlugers()
    {
        return $this->hasMany(DetalhesAluger::class, ['id_detalhes_aluguer' => 'id_detalhes_aluger'])->viaTable('extra_detalhes_aluger', ['id_extra' => 'id_extra']);
    }

    /**
     * Gets query for [[ExtraDetalhesAlugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraDetalhesAlugers()
    {
        return $this->hasMany(ExtraDetalhesAluger::class, ['id_extra' => 'id_extra']);
    }
}
