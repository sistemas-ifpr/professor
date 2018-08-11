<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimentacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimentacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Movimentacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'recurso_id',
            'local_id',
            'usuario_id',
            'data',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
