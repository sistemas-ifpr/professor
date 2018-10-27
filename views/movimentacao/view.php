<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Movimentacao */

$this->title = $model->id;
$this->params['breadcrumbs'][] = 'Movimentações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimentacao-view">

    <h1><?= Html::encode($model->recurso->nome . " >> " . $model->local->nome) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'recurso_id',
                'value' => function ($model) {
                    return $model->recurso->nome;
                }
            ],
            [
                'attribute' => 'local_id',
                'value' => function ($model) {
                    return $model->local->nome;
                }
            ],
            [
                'attribute' => 'usuario_id',
                'value' => function ($model) {
                    return $model->usuario->nome;
                }
            ],
            'data',
            'comentario:ntext',
        ],
    ]) ?>

</div>
