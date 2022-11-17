<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detalhes_aluger".
 *
 * @property int $id_detalhes_aluguer
 * @property string|null $data_inicio
 * @property string|null $data_fim
 * @property int $id_veiculo
 * @property int $id_user
 * @property int $id_seguro
 * @property int $id_localizacao_levantamento
 * @property int $id_localizacao_devolucao
 *
 * @property ExtraDetalhesAluger[] $extraDetalhesAlugers
 * @property Extra[] $extras
 * @property Localizacao $localizacaoDevolucao
 * @property Localizacao $localizacaoLevantamento
 * @property Seguro $seguro
 * @property User $user
 * @property Veiculo $veiculo
 */
class DetalhesAluger extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalhes_aluger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_inicio', 'data_fim'], 'safe'],
            [['id_veiculo', 'id_user', 'id_seguro', 'id_localizacao_levantamento', 'id_localizacao_devolucao'], 'required'],
            [['id_veiculo', 'id_user', 'id_seguro', 'id_localizacao_levantamento', 'id_localizacao_devolucao'], 'integer'],
            [['id_veiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Veiculo::class, 'targetAttribute' => ['id_veiculo' => 'id_veiculo']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_seguro'], 'exist', 'skipOnError' => true, 'targetClass' => Seguro::class, 'targetAttribute' => ['id_seguro' => 'id_seguro']],
            [['id_localizacao_levantamento'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['id_localizacao_levantamento' => 'id_localizacao']],
            [['id_localizacao_devolucao'], 'exist', 'skipOnError' => true, 'targetClass' => Localizacao::class, 'targetAttribute' => ['id_localizacao_devolucao' => 'id_localizacao']],
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
            'id_veiculo' => 'Id Veiculo',
            'id_user' => 'Id User',
            'id_seguro' => 'Id Seguro',
            'id_localizacao_levantamento' => 'Id Localizacao Levantamento',
            'id_localizacao_devolucao' => 'Id Localizacao Devolucao',
        ];
    }

    /**
     * Gets query for [[ExtraDetalhesAlugers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraDetalhesAlugers()
    {
        return $this->hasMany(ExtraDetalhesAluger::class, ['id_detalhes_aluger' => 'id_detalhes_aluguer']);
    }

    /**
     * Gets query for [[Extras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtras()
    {
        return $this->hasMany(Extra::class, ['id_extra' => 'id_extra'])->viaTable('extra_detalhes_aluger', ['id_detalhes_aluger' => 'id_detalhes_aluguer']);
    }

    /**
     * Gets query for [[LocalizacaoDevolucao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacaoDevolucao()
    {
        return $this->hasOne(Localizacao::class, ['id_localizacao' => 'id_localizacao_devolucao']);
    }

    /**
     * Gets query for [[LocalizacaoLevantamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalizacaoLevantamento()
    {
        return $this->hasOne(Localizacao::class, ['id_localizacao' => 'id_localizacao_levantamento']);
    }

    /**
     * Gets query for [[Seguro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguro()
    {
        return $this->hasOne(Seguro::class, ['id_seguro' => 'id_seguro']);
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
        return $this->hasOne(Veiculo::class, ['id_veiculo' => 'id_veiculo']);
    }
}
