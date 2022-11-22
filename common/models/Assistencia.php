<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assistencia".
 *
 * @property int $id_assistencia
 * @property string $dataPedido
 * @property string $mensagem
 * @property string $localizacao
 * @property int $veiculo_id
 *
 * @property Veiculo $veiculo
 */
class Assistencia extends \yii\db\ActiveRecord
{
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
            [['dataPedido', 'mensagem', 'localizacao', 'veiculo_id'], 'required'],
            [['dataPedido'], 'safe'],
            [['veiculo_id'], 'integer'],
            [['mensagem'], 'string', 'max' => 91],
            [['localizacao'], 'string', 'max' => 51],
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
            'dataPedido' => 'Data Pedido',
            'mensagem' => 'Mensagem',
            'localizacao' => 'Localizacao',
            'veiculo_id' => 'Veiculo ID',
        ];
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
