<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "imagem".
 *
 * @property int $id_imagem
 * @property string $imagem
 * @property int $id_veiculo
 *
 * @property Veiculo $veiculo
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
            [['imagem', 'id_veiculo'], 'required'],
            [['id_veiculo'], 'integer'],
            [['imagem'], 'string', 'max' => 81],
            [['id_veiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::class, 'targetAttribute' => ['id_veiculo' => 'id_veiculo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imagem' => 'Id Imagem',
            'imagem' => 'Imagem',
            'id_veiculo' => 'Id Veiculo',
        ];
    }

    /**
     * Gets query for [[Veiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculo()
    {
        return $this->hasOne(Veiculo::class, ['id_veiculo' => 'id_veiculo']);
    }
}
