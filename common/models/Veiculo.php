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
 * @property int $idTipoVeiculo
 *
 * @property Detalhesaluger[] $detalhesalugers
 * @property Tipoveiculo $idTipoVeiculo0
 * @property Imagem[] $imagems
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
            [['marca', 'modelo', 'combustivel', 'preco', 'matricula', 'descricao', 'idTipoVeiculo'], 'required'],
            [['preco'], 'number'],
            [['idTipoVeiculo'], 'integer'],
            [['marca'], 'string', 'max' => 21],
            [['modelo'], 'string', 'max' => 31],
            [['combustivel', 'matricula'], 'string', 'max' => 9],
            [['descricao'], 'string', 'max' => 255],
            [['idTipoVeiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoveiculo::class, 'targetAttribute' => ['idTipoVeiculo' => 'idTipoVeiculo']],
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
            'idTipoVeiculo' => 'Id Tipo Veiculo',
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
     * Gets query for [[IdTipoVeiculo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoVeiculo0()
    {
        return $this->hasOne(Tipoveiculo::class, ['idTipoVeiculo' => 'idTipoVeiculo']);
    }

    /**
     * Gets query for [[Imagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagems()
    {
        return $this->hasMany(Imagem::class, ['idVeiculo' => 'idVeiculo']);
    }
}
