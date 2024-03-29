<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;

\yii\widgets\MaskedInputAsset::register($this);

?>

<div class="reservas-form">
    <?php $form = ActiveForm::begin(['options' => ['class' => 'noenter']]); ?>
    <div class="row" style="margin:0px !important">
        <div class="col-md-1">
            <div class="form-group">
                <br>
                <label>N°</label><br>
                <p><?= $nro_reserva ?></p>
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
            <div class="form-group">
                <br>
                <label>Etapa:</label><br>
                <p><?= $etapa->etapa_nombre ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'urbanizacion_area_socialfk')->dropDownList($list_areas, [])->label("Área Social") ?>
        </div>

    </div>
    <div class="row" style="margin:0px !important">
        <!-- <div class="col-md-2">
            <div class="form-group">
                <br>
                <label>Fecha</label><br>
               
            </div>
        </div> -->
        <div class="col-md-2">
            <?=
                $form->field($model, 'fecha_reserva')->widget(DatePicker::class, [
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ],
                    'options' => ['class' => 'form-control input-md', 'style' => 'font-size:12px;', 'placeholder' => 'yyyy-mm-dd', 'data-inputfk' => Html::getInputId($model, 'estado_civil')],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ])->label("Fecha")
            ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'hora_inicio')->textInput(['class' => 'hora form-control', 'onchange' => 'sumarhora.call(this)']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'hora_fin')->textInput(['class' => 'hora form-control', 'id' => 'hora_fin']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'celular')->textInput(['class' => 'solonumero form-control', 'maxlength' => true]) ?>
        </div>
    </div>

    <div class="row" style="margin:0px !important;padding:10px">
        <div class="form-group">
            <?= Html::checkbox('terminos', false, ['class'=>'terminos']) ?>
            <span>Aceptar <a href="javascript:" class="link" style="color:#337ab7 !important">Términos y Condiciones</a></span><br>
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success', 'disabled' => true,'id'=>'btnsavereserva']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJsFile('@web/js/moment.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/reservas.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>