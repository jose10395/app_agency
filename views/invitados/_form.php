<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Invitados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'apellido_invitado')->textInput([]) ?>

        <?= $form->field($model, 'nombre_invitado')->textInput([]) ?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-3"></div>
</div>