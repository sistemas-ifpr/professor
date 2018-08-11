<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Movimentacao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimentacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recurso_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuario_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
