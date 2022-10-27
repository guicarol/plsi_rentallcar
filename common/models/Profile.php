<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $idProfile
 * @property string $nome
 * @property string $apelido
 * @property int $telemovel
 * @property int $nif
 * @property string $nrCartaConducao
 *
 * @property User $idProfile0
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProfile', 'nome', 'apelido', 'telemovel', 'nif', 'nrCartaConducao'], 'required'],
            [['idProfile', 'telemovel', 'nif'], 'integer'],
            [['nome', 'apelido'], 'string', 'max' => 21],
            [['nrCartaConducao'], 'string', 'max' => 12],
            [['idProfile'], 'unique'],
            [['idProfile'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idProfile' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProfile' => 'Id Profile',
            'nome' => 'Nome',
            'apelido' => 'Apelido',
            'telemovel' => 'Telemovel',
            'nif' => 'Nif',
            'nrCartaConducao' => 'Nr Carta Conducao',
        ];
    }

    /**
     * Gets query for [[IdProfile0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfile0()
    {
        return $this->hasOne(User::class, ['id' => 'idProfile']);
    }
}
