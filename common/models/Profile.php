<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id_profile
 * @property string $nome
 * @property string $apelido
 * @property int $telemovel
 * @property int $nif
 * @property string $nr_carta_conducao
 *
 * @property Analise[] $analises
 * @property DetalhesAluguer[] $detalhesAluguers
 * @property User $profile
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
            [['id_profile', 'nome', 'apelido', 'telemovel', 'nif', 'nr_carta_conducao'], 'required'],
            [['id_profile', 'telemovel', 'nif'], 'integer'],
            [['nome', 'apelido'], 'string', 'max' => 21],
            [['nr_carta_conducao'], 'string', 'max' => 12],
            [['telemovel'], 'unique'],
            [['nif'], 'unique'],
            [['nr_carta_conducao'], 'unique'],
            [['id_profile'], 'unique'],
            [['id_profile'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_profile' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_profile' => 'Id Profile',
            'nome' => 'Nome',
            'apelido' => 'Apelido',
            'telemovel' => 'Telemovel',
            'nif' => 'Nif',
            'nr_carta_conducao' => 'Nr Carta Conducao',
        ];
    }

    /**
     * Gets query for [[Analises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnalises()
    {
        return $this->hasMany(Analise::class, ['profile_id' => 'id_profile']);
    }

    /**
     * Gets query for [[DetalhesAluguers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAluguers()
    {
        return $this->hasMany(DetalhesAluguer::class, ['profile_id' => 'id_profile']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(User::class, ['id' => 'id_profile']);
    }
}
