<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "veiculo".
 *
 * @property int $id_veiculo
 * @property string $marca
 * @property string $modelo
 * @property string $combustivel
 * @property float $preco
 * @property string $matricula
 * @property string $descricao
 * @property int $id_tipo_veiculo
 *
 * @property DetalhesAluger[] $detalhesAlugers
 * @property Imagem[] $imagems
 * @property TipoVeiculo $tipoVeiculo
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
            [['marca', 'modelo', 'combustivel', 'preco', 'matricula', 'descricao', 'id_tipo_veiculo'], 'required'],
            [['preco'], 'number'],
            [['id_tipo_veiculo'], 'integer'],
            [['marca'], 'string', 'max' => 21],
            [['modelo'], 'string', 'max' => 31],
            [['combustivel', 'matricula'], 'string', 'max' => 9],
            [['descricao'], 'string', 'max' => 255],
            [['matricula'], 'unique'],
            [['id_tipo_veiculo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoVeiculo::class, 'targetAttribute' => ['id_tipo_veiculo' => 'id_tipo_veiculo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_veiculo' => 'Id Veiculo',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'combustivel' => 'Combustivel',
            'preco' => 'Preco',
            'matricula' => 'Matricula',
            'descricao' => 'Descricao',
            'id_tipo_veiculo' => 'Id Tipo Veiculo',
        ];
    }

    /**
     * Gets query for [[DetalhesAlugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAlugers()
    {
        return $this->hasMany(DetalhesAluger::class, ['id_veiculo' => 'id_veiculo']);
    }

    /**
     * Gets query for [[Imagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagems()
    {
        return $this->hasMany(Imagem::class, ['id_veiculo' => 'id_veiculo']);
    }

    /**
     * Gets query for [[TipoVeiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoVeiculo()
    {
        return $this->hasOne(TipoVeiculo::class, ['id_tipo_veiculo' => 'id_tipo_veiculo']);
    }
}
