<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> | 
        <?= Html::a('Movimentar', ['movimentacao/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'nome',
            'fornecedor',
            'aquisicao',
        ],
    ]) ?>
    
    
    <hr/>
    <h3> Movimentações </h3>
    
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'data',
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
            'comentario:ntext',
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
