<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Recurso;
use app\models\Local;

/* @var $this yii\web\View */
/* @var $model app\models\Movimentacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimentacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recurso_id')
        ->dropDownList(
            ArrayHelper::map(Recurso::find()->all(), 'id', 'nome'),           // Flat array ('id'=>'label')
            ['prompt'=>'Selecione...']    // options
        )
    //$form->field($model, 'recurso_id')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'local_id')
        ->dropDownList(
            ArrayHelper::map(Local::find()->all(), 'id', 'nome'),           // Flat array ('id'=>'label')
            ['prompt'=>'Selecione...']    // options
        )
    //$form->field($model, 'recurso_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
