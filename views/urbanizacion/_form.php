<?php

//use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Urbanizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="urbanizacion-form" style="padding:10px">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'urbanizacion_nombre')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
