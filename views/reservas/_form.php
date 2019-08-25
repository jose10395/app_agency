<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

\yii\widgets\MaskedInputAsset::register($this);
?>

<div class="reservas-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row" style="margin:0px !important">
        <div class="col-md-1">
            <div class="form-group">
                <br>
                <label>N°</label><br>
                <p><?= $nro_reserva ?></p>
            </div>           
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <br>
                <label>Fecha</label><br>
                <p><?= date('Y-m-d') ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <br>
                <label>Urbanización:</label><br>
                <p><?= $urbanizacion->urbanizacion_nombre ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'urbanizacion_area_socialfk')->dropDownList($list_areas, [])->label("Área Social") ?>
        </div>

    </div>
    <div class="row" style="margin:0px !important">
        <div class="col-md-2">
            <?= $form->field($model, 'hora_inicio')->textInput(['class' => 'hora form-control']) ?>            
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'hora_fin')->textInput(['class' => 'hora form-control']) ?>
        </div>               
        <div class="col-md-3">
            <?= $form->field($model, 'celular')->textInput(['class'=>'solonumero form-control','maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs(<<<JS
       $(document).ready(function () {
        $('.hora').inputmask('99:99');
    }); 
JS
        , 3);
?>