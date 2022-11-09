<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detalhesaluger".
 *
 * @property int $idDetalhesAluguer
 * @property string|null $dataInicio
 * @property string|null $dataFim
 * @property int $idVeiculo
 * @property int $idUser
 * @property int $idSeguro
 * @property int $idLocalizacaoLevantamento
 * @property int $idLocalizacaoDevolucao
 *
 * @property Extradetalhesaluger[] $extradetalhesalugers
 * @property Extra[] $idExtras
 * @property Localizacao $idLocalizacaoDevolucao0
 * @property Localizacao $idLocalizacaoLevantamento0
 * @property Seguro $idSeguro0
 * @property User $idUser0
 * @property Veiculo $idVeiculo0
 */
class Detalhesaluger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalhesaluger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dataInicio', 'dataFim'], 'safe'],
            [['idVeiculo', 'idUser', 'idSeguro', 'idLocalizacaoLevantamento', 'idLocalizacaoDevolucao'], 'required'],
            [['idVeiculo', 'idUser', 'idSeguro', 'idLocalizacaoLevantamento', 'idLocalizacaoDevolucao'], 'integer'],
            [['idVeiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::class, 'targetAttribute' => ['idVeiculo' => 'idVeiculo']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idUser' => 'id']],
            [['idSeguro'], 'exist', 'skipOnError' => true, 'targetClass' => Seguro::class, 'targetAttribute' => ['idSeguro' => 'idSeguro']],
            [['idLocalizacaoLevantamento'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['idLocalizacaoLevantamento' => 'idLocalizacao']],
            [['idLocalizacaoDevolucao'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['idLocalizacaoDevolucao' => 'idLocalizacao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idDetalhesAluguer' => 'Id Detalhes Aluguer',
            'dataInicio' => 'Data Inicio',
            'dataFim' => 'Data Fim',
            'idVeiculo' => 'Id Veiculo',
            'idUser' => 'Id User',
            'idSeguro' => 'Id Seguro',
            'idLocalizacaoLevantamento' => 'Id Localizacao Levantamento',
            'idLocalizacaoDevolucao' => 'Id Localizacao Devolucao',
        ];
    }

    /**
     * Gets query for [[Extradetalhesalugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtradetalhesalugers()
    {
        return $this->hasMany(Extradetalhesaluger::class, ['idDetalhesAluger' => 'idDetalhesAluguer']);
    }

    /**
     * Gets query for [[IdExtras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdExtras()
    {
        return $this->hasMany(Extra::class, ['idExtra' => 'idExtra'])->viaTable('extradetalhesaluger', ['idDetalhesAluger' => 'idDetalhesAluguer']);
    }

    /**
     * Gets query for [[IdLocalizacaoDevolucao0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocalizacaoDevolucao0()
    {
        return $this->hasOne(Localizacao::class, ['idLocalizacao' => 'idLocalizacaoDevolucao']);
    }

    /**
     * Gets query for [[IdLocalizacaoLevantamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocalizacaoLevantamento0()
    {
        return $this->hasOne(Localizacao::class, ['idLocalizacao' => 'idLocalizacaoLevantamento']);
    }

    /**
     * Gets query for [[IdSeguro0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdSeguro0()
    {
        return $this->hasOne(Seguro::class, ['idSeguro' => 'idSeguro']);
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

    /**
     * Gets query for [[IdVeiculo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVeiculo0()
    {
        return $this->hasOne(Veiculo::class, ['idVeiculo' => 'idVeiculo']);
    }
}
