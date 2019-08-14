<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UrbanizacionEtapa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="urbanizacion-etapa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'urbanizacionfk')->dropDownList($urbanizaciones,['prompt'=>'-- seleccione --']) ?>

    <?= $form->field($model, 'etapa_nombre')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
