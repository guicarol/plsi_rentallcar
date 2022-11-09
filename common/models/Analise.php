<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "analise".
 *
 * @property int $idAnalise
 * @property string $comentario
 * @property int $classificacao
 * @property string|null $dataAnalise
 * @property int $idUser
 *
 * @property User $idUser0
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
            [['comentario', 'classificacao', 'idUser'], 'required'],
            [['classificacao', 'idUser'], 'integer'],
            [['dataAnalise'], 'safe'],
            [['comentario'], 'string', 'max' => 255],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAnalise' => 'Id Analise',
            'comentario' => 'Comentario',
            'classificacao' => 'Classificacao',
            'dataAnalise' => 'Data Analise',
            'idUser' => 'Id User',
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::class, ['id' => 'idUser']);
    }
}
