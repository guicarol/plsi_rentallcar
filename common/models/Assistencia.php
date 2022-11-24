<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assistencia".
 *
 * @property int $id_assistencia
 * @property string $data_pedido
 * @property string $mensagem
 * @property string $localizacao
 * @property string $condicao
 * @property int $veiculo_id
 * @property int $profile_id
 *
 * @property Profile $profile
 * @property Veiculo $veiculo
 */
class Assistencia extends \yii\db\ActiveRecord
{

    public $veiculoDrop, $condicaoDrop;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assistencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_pedido', 'mensagem', 'localizacao', 'veiculo_id', 'profile_id'], 'required'],
            [['data_pedido'], 'safe'],
            [['condicao'], 'string'],
            [['veiculo_id', 'profile_id'], 'integer'],
            [['mensagem'], 'string', 'max' => 91],
            [['localizacao'], 'string', 'max' => 51],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id_profile']],
            [['veiculo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::class, 'targetAttribute' => ['veiculo_id' => 'id_veiculo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_assistencia' => 'Id Assistencia',
            'data_pedido' => 'Data Pedido',
            'mensagem' => 'Mensagem',
            'localizacao' => 'Localizacao',
            'condicao' => 'Condicao',
            'veiculo_id' => 'Veiculo ID',
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

    /**
     * Gets query for [[Veiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculo()
    {
        return $this->hasOne(Veiculo::class, ['id_veiculo' => 'veiculo_id']);
    }
}
