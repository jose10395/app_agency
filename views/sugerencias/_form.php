<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sugerencias-form" style="padding:40px">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'asunto')->textInput([]) ?>

    <?= $form->field($model, 'detalle')->textInput([]) ?>

    <!-- <div class="row">
        <div class="col-md-8"> -->
    <?=
        $form->field($model, 'archivo')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showPreview' => false,
                'showCaption' => true,
                'showRemove' => true,
                'showUpload' => false
            ]
        ]);
    ?>
    <!-- </div>
    </div> -->
    <div class="form-group field-sugerencias-detalle is-empty has-success">
        <label class="control-label col-sm-3" for="sugerencias-detalle">&nbsp;</label>
        <div class="col-sm-6 text-right">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <span class="material-input"></span>
    </div>   

    <?php ActiveForm::end(); ?>

</div>