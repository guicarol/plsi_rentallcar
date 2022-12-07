<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detalhes_aluguer".
 *
 * @property int $id_detalhes_aluguer
 * @property string|null $data_inicio
 * @property string|null $data_fim
 * @property int $veiculo_id
 * @property int $profile_id
 * @property int $seguro_id
 * @property int $localizacao_levantamento_id
 * @property int $localizacao_devolucao_id
 *
 * @property ExtraDetalhesAluguer[] $extraDetalhesAluguers
 * @property Fatura[] $faturas
 * @property Localizacao $localizacaoDevolucao
 * @property Localizacao $localizacaoLevantamento
 * @property Profile $profile
 * @property Seguro $seguro
 * @property Veiculo $veiculo
 */
class Detalhesaluguer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalhes_aluguer';
    }

    public $extras;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_inicio', 'data_fim'], 'safe'],
            [['veiculo_id', 'profile_id', 'seguro_id', 'localizacao_levantamento_id', 'localizacao_devolucao_id'], 'required'],
            [['veiculo_id', 'profile_id', 'seguro_id', 'localizacao_levantamento_id', 'localizacao_devolucao_id'], 'integer'],
            [['veiculo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::class, 'targetAttribute' => ['veiculo_id' => 'id_veiculo']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['profile_id' => 'id_profile']],
            [['seguro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seguro::class, 'targetAttribute' => ['seguro_id' => 'id_seguro']],
            [['localizacao_levantamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['localizacao_levantamento_id' => 'id_localizacao']],
            [['localizacao_devolucao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['localizacao_devolucao_id' => 'id_localizacao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detalhes_aluguer' => 'Id Detalhes Aluguer',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
            'veiculo_id' => 'Veiculo',
            'profile_id' => 'Profile',
            'seguro_id' => 'Seguro',
            'localizacao_levantamento_id' => 'Localizacao Levantamento',
            'localizacao_devolucao_id' => 'Localizacao Devolucao',
        ];
    }

    /**
     * Gets query for [[ExtraDetalhesAluguers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraDetalhesAluguers()
    {
        return $this->hasMany(ExtraDetalhesAluguer::class, ['detalhes_aluguer_id' => 'id_detalhes_aluguer']);
    }

    /**
     * Gets query for [[Faturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::class, ['detalhes_aluguer_fatura_id' => 'id_detalhes_aluguer']);
    }

    /**
     * Gets query for [[LocalizacaoDevolucao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacaoDevolucao()
    {
        return $this->hasOne(Localizacao::class, ['id_localizacao' => 'localizacao_devolucao_id']);
    }

    /**
     * Gets query for [[LocalizacaoLevantamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacaoLevantamento()
    {
        return $this->hasOne(Localizacao::class, ['id_localizacao' => 'localizacao_levantamento_id']);
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
     * Gets query for [[Seguro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguro()
    {
        return $this->hasOne(Seguro::class, ['id_seguro' => 'seguro_id']);
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
