<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detalhesaluger".
 *
 * @property int $idDetalhesAluguer
 * @property string|null $dataInicio
 * @property string|null $dataFim
 * @property int $id_veiculo
 * @property int $id_user
 * @property int $id_seguro
 * @property int $id_localizacaoLevantamento
 * @property int $id_localizacaoDevolucao
 *
 * @property Extradetalhesaluger[] $extradetalhesalugers
 * @property Extra[] $idExtras
 * @property Localizacao $localizacaoDevolucao
 * @property Localizacao $localizacaoLevantamento
 * @property Seguro $seguro
 * @property User $user
 * @property Veiculo $veiculo
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
            [['id_veiculo', 'id_user', 'id_seguro', 'id_localizacaoLevantamento', 'id_localizacaoDevolucao'], 'required'],
            [['id_veiculo', 'id_user', 'id_seguro', 'id_localizacaoLevantamento', 'id_localizacaoDevolucao'], 'integer'],
            [['id_veiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::class, 'targetAttribute' => ['id_veiculo' => 'idVeiculo']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_seguro'], 'exist', 'skipOnError' => true, 'targetClass' => Seguro::class, 'targetAttribute' => ['id_seguro' => 'idSeguro']],
            [['id_localizacaoLevantamento'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['id_localizacaoLevantamento' => 'idLocalizacao']],
            [['id_localizacaoDevolucao'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['id_localizacaoDevolucao' => 'idLocalizacao']],
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
            'id_veiculo' => 'Id Veiculo',
            'id_user' => 'Id User',
            'id_seguro' => 'Id Seguro',
            'id_localizacaoLevantamento' => 'Id Localizacao Levantamento',
            'id_localizacaoDevolucao' => 'Id Localizacao Devolucao',
        ];
    }

    /**
     * Gets query for [[Extradetalhesalugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtradetalhesalugers()
    {
        return $this->hasMany(Extradetalhesaluger::class, ['id_detalhesAluger' => 'idDetalhesAluguer']);
    }

    /**
     * Gets query for [[IdExtras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdExtras()
    {
        return $this->hasMany(Extra::class, ['idExtra' => 'idExtra'])->viaTable('extradetalhesaluger', ['id_detalhesAluger' => 'idDetalhesAluguer']);
    }

    /**
     * Gets query for [[LocalizacaoDevolucao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacaoDevolucao()
    {
        return $this->hasOne(Localizacao::class, ['idLocalizacao' => 'id_localizacaoDevolucao']);
    }

    /**
     * Gets query for [[LocalizacaoLevantamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacaoLevantamento()
    {
        return $this->hasOne(Localizacao::class, ['idLocalizacao' => 'id_localizacaoLevantamento']);
    }

    /**
     * Gets query for [[Seguro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguro()
    {
        return $this->hasOne(Seguro::class, ['idSeguro' => 'id_seguro']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    /**
     * Gets query for [[Veiculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeiculo()
    {
        return $this->hasOne(Veiculo::class, ['idVeiculo' => 'id_veiculo']);
    }
}
