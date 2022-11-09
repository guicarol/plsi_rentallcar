<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "imagem".
 *
 * @property int $idImagem
 * @property string $imagem
 * @property int $idVeiculo
 *
 * @property Veiculo $idVeiculo0
 */
class Imagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imagem', 'idVeiculo'], 'required'],
            [['idVeiculo'], 'integer'],
            [['imagem'], 'string', 'max' => 81],
            [['idVeiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::class, 'targetAttribute' => ['idVeiculo' => 'idVeiculo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idImagem' => 'Id Imagem',
            'imagem' => 'Imagem',
            'idVeiculo' => 'Id Veiculo',
        ];
    }

    /**
     * Gets query for [[IdVeiculo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVeiculo0()
    {
        return $this->hasOne(Veiculo::class, ['idVeiculo' => 'idVeiculo']);
    }
}
