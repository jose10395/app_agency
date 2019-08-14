<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UrbanizacionAreaSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="urbanizacion-area-social-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'urbanizacion_etapafk')->textInput() ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
