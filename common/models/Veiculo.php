<?php

namespace common\models;

use Yii;

use common\models\UploadForm;
use yii\base\Model;
use yii\web\UploadedFile;

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
 * @property string $estado
 * @property int $tipo_veiculo_id
 * @property int $localizacao_id
 * @property int $franquia 
 *
 * @property Assistencia[] $assistencias
 * @property DetalhesAluguer[] $detalhesAluguers
 * @property Imagem[] $imagems
 * @property Localizacao $localizacao
 * @property TipoVeiculo $tipoVeiculo
 */
class Veiculo extends \yii\db\ActiveRecord
{

    public $tipoVeiculos;

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
            [['marca', 'modelo', 'combustivel', 'preco', 'matricula', 'descricao', 'estado', 'tipo_veiculo_id', 'localizacao_id', 'franquia'], 'required'],
            [['preco'], 'number'],
            [['estado'], 'string'],
            [['tipo_veiculo_id', 'localizacao_id', 'franquia'], 'integer'],
            [['marca'], 'string', 'max' => 21],
            [['modelo'], 'string', 'max' => 31],
            [['combustivel', 'matricula'], 'string', 'max' => 9],
            [['descricao'], 'string', 'max' => 255],
            [['matricula'], 'unique'],
            [['localizacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['localizacao_id' => 'id_localizacao']],
            [['tipo_veiculo_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoVeiculo::class, 'targetAttribute' => ['tipo_veiculo_id' => 'id_tipo_veiculo']],
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
            'estado' => 'Estado',
            'tipo_veiculo_id' => 'Categoria',
            'localizacao_id' => 'Localizacao carro',
            'franquia' => 'Franquia',
        ];
    }

    /**
     * Gets query for [[Assistencias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssistencias()
    {
        return $this->hasMany(Assistencia::class, ['veiculo_id' => 'id_veiculo']);
    }

    /**
     * Gets query for [[DetalhesAluguers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAluguers()
    {
        return $this->hasMany(DetalhesAluguer::class, ['veiculo_id' => 'id_veiculo']);
    }

    /**
     * Gets query for [[Imagems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImagems()
    {
        return $this->hasMany(Imagem::class, ['veiculo_id' => 'id_veiculo']);
    }

    /**
     * Gets query for [[Localizacao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacao()
    {
        return $this->hasOne(Localizacao::class, ['id_localizacao' => 'localizacao_id']);
    }

    /**
     * Gets query for [[TipoVeiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoVeiculo()
    {
        return $this->hasOne(TipoVeiculo::class, ['id_tipo_veiculo' => 'tipo_veiculo_id']);
    }

}
