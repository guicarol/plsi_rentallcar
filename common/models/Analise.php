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
 * @property int $profile_id
 *
 * @property Profile $profile
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
            [['comentario', 'classificacao', 'profile_id'], 'required'],
            [['classificacao', 'profile_id'], 'integer'],
            [['data_analise'], 'safe'],
            [['comentario'], 'string', 'max' => 255],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id_profile']],
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
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id_profile' => 'profile_id']);
    }
}
