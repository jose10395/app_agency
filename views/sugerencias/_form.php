<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sugerencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asunto')->textInput([]) ?>

    <?= $form->field($model, 'detalle')->textInput([]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
