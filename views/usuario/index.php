<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'nome',
            //'email:text',
            [
                'label' => 'Email do Usu',
                'attribute' => 'email',
                'format' => 'html',
                'value' => function ($model) {
                    return '<a href="mailto:'.$model->email.'">'.$model->email.'</a>';
                }
            ],
            [
                'attribute' => 'senha',
                'visible' => \Yii::$app->user->identity->isAdmin(),
            ],

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{outro}',
                'contentOptions' => ['style' => 'width: 20px'],
                'buttons'=>[
                    'outro'=>function ($url, $model) {
                        $t = 'index.php?r=site/view&id='.$model->id;
                        return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', ['value'=>$t, 'class' => 'btn btn-default btn-xs custom_button']);
                    },
                ],
            ],
            
            ],
    ]); ?>
</div>
