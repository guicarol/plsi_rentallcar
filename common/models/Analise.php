<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "analise".
 *
 * @property int $id_analise
 * @property string $comentario
 * @property int $classificacao
 * @property string|null $data_analise
 * @property int $id_user
 *
 * @property User $user
 */
class Analise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'analise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comentario', 'classificacao', 'id_user'], 'required'],
            [['classificacao', 'id_user'], 'integer'],
            [['data_analise'], 'safe'],
            [['comentario'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_analise' => 'Id Analise',
            'comentario' => 'Comentario',
            'classificacao' => 'Classificacao',
            'data_analise' => 'Data Analise',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
