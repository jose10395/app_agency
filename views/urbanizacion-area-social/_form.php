<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UrbanizacionAreaSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="urbanizacion-area-social-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'urbanizacion_etapafk')->dropDownList($etapas,['prompt'=>'-- seleccione --']) ?>

    <?= $form->field($model, 'nombre')->textInput([]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
