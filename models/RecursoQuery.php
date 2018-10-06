<?php
namespace app\models;

use Yii;
use yii\db\ActiveQuery;

class RecursoQuery extends ActiveQuery
{
    // conditions appended by default (can be skipped)
    public function init()
    {
        $this->andOnCondition(['usuario_id' => Yii::$app->user->identity->id]);
        parent::init();
    }
    
    public function year($year) {
        return $this->andOnCondition(['between','aquisicao', $year.'-01-01', $year.'-12-31']);
    }
}