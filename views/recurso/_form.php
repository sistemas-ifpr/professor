<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recurso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fornecedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aquisicao')->textInput(['type'=>'date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
