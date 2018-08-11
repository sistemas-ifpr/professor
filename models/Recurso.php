<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recursos".
 *
 * @property string $id
 * @property string $nome
 * @property string $fornecedor
 * @property string $aquisicao
 *
 * @property Movimentacoes[] $movimentacoes
 */
class Recurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'fornecedor', 'aquisicao'], 'required'],
            [['aquisicao'], 'safe'],
            [['nome', 'fornecedor'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'fornecedor' => 'Fornecedor',
            'aquisicao' => 'Data de Aquisição',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimentacoes()
    {
        return $this->hasMany(Movimentacao::className(), ['recurso_id' => 'id']);
    }
}
