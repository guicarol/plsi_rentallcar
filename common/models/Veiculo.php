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
 *
 * @property DetalhesAluger[] $detalhesAlugers
 * @property Imagem[] $imagems
 * @property Localizacao $localizacao
 * @property TipoVeiculo $tipoVeiculo
 */
class Veiculo extends \yii\db\ActiveRecord
{
    public $imageFiles;

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
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],

            [['marca', 'modelo', 'combustivel', 'preco', 'matricula', 'descricao', 'estado', 'tipo_veiculo_id', 'localizacao_id'], 'required'],
            [['preco'], 'number'],
            [['estado'], 'string'],
            [['tipo_veiculo_id', 'localizacao_id'], 'integer'],
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
        ];
    }

    /**
     * Gets query for [[DetalhesAlugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalhesAlugers()
    {
        return $this->hasMany(DetalhesAluger::class, ['veiculo_id' => 'id_veiculo']);
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

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);

            }
            return true;
        } else {
            return false;
        }
    }
}
