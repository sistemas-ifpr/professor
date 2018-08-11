<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property string $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 *
 * @property Movimentacoes[] $movimentacoes
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha'], 'required'],
            [['nome', 'email'], 'string', 'max' => 500],
            [['senha'], 'string', 'max' => 100],
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
            'email' => 'E-mail',
            'senha' => 'Senha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimentacoes()
    {
        return $this->hasMany(Movimentacao::className(), ['usuario_id' => 'id']);
    }
}
