<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimentacoes".
 *
 * @property string $id
 * @property string $recurso_id
 * @property string $local_id
 * @property string $usuario_id
 * @property string $data
 *
 * @property Recursos $recurso
 * @property Locais $local
 * @property Usuarios $usuario
 */
class Movimentacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimentacoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recurso_id', 'local_id', 'usuario_id', 'data'], 'required'],
            [['recurso_id', 'local_id', 'usuario_id'], 'integer'],
            [['data'], 'safe'],
            [['recurso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recurso::className(), 'targetAttribute' => ['recurso_id' => 'id']],
            [['local_id'], 'exist', 'skipOnError' => true, 'targetClass' => Local::className(), 'targetAttribute' => ['local_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recurso_id' => 'Recurso',
            'local_id' => 'Local',
            'usuario_id' => 'Responsável',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecurso()
    {
        return $this->hasOne(Recurso::className(), ['id' => 'recurso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocal()
    {
        return $this->hasOne(Local::className(), ['id' => 'local_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsavel()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}
