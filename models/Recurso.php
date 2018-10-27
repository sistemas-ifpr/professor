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
 * @property int $usuario_id
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
            [['usuario_id'], 'integer'],
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
            'aquisicao' => 'Aquisicao',
            'usuario_id' => 'Usuário',
        ];
    }
    
    public static function find()
    {
        return new RecursoQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsavel()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimentacoes()
    {
        return $this->hasMany(Movimentacao::className(), ['recurso_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasMany(Movimentacao::className(), ['recurso_id' => 'id']);
    }
    
    public function beforeSave($options = array()) {
        if ($this->isNewRecord) {
            $this->usuario_id = \Yii::$app->user->identity->id; 
        }

        return parent::beforeSave($options);
    }
}
