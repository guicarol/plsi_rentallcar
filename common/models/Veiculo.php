<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "veiculo".
 *
 * @property int $idVeiculo
 * @property string $marca
 * @property string $modelo
 * @property string $combustivel
 * @property float $preco
 * @property string $matricula
 * @property string $descricao
 * @property int $id_tipoVeiculo
 *
 * @property Detalhesaluger[] $detalhesalugers
 * @property Imagem[] $imagems
 * @property Tipoveiculo $tipoVeiculo
 */
class Veiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'veiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marca', 'modelo', 'combustivel', 'preco', 'matricula', 'descricao', 'id_tipoVeiculo'], 'required'],
            [['preco'], 'number'],
            [['id_tipoVeiculo'], 'integer'],
            [['marca'], 'string', 'max' => 21],
            [['modelo'], 'string', 'max' => 31],
            [['combustivel', 'matricula'], 'string', 'max' => 9],
            [['descricao'], 'string', 'max' => 255],
            [['id_tipoVeiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoveiculo::class, 'targetAttribute' => ['id_tipoVeiculo' => 'idTipoVeiculo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVeiculo' => 'Id Veiculo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'combustivel' => 'Combustivel',
            'preco' => 'Preco',
            'matricula' => 'Matricula',
            'descricao' => 'Descricao',
            'id_tipoVeiculo' => 'Id Tipo Veiculo',
        ];
    }

    /**
     * Gets query for [[Detalhesalugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesalugers()
    {
        return $this->hasMany(Detalhesaluger::class, ['idVeiculo' => 'idVeiculo']);
    }

    /**
     * Gets query for [[Imagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagems()
    {
        return $this->hasMany(Imagem::class, ['id_Veiculo' => 'idVeiculo']);
    }

    /**
     * Gets query for [[TipoVeiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoVeiculo()
    {
        return $this->hasOne(Tipoveiculo::class, ['idTipoVeiculo' => 'id_tipoVeiculo']);
    }
}
