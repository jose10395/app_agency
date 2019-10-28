<?php

use app\models\Invitados;
//use yii\widgets\ActiveForm;
use \unclead\multipleinput\TabularInput;
use yii\bootstrap\BootstrapAsset;
use kartik\widgets\DatePicker;
use kartik\form\ActiveForm;
use yii\bootstrap\Html;

$listaOpciones = [
    "Invitado" => "Invitado", "Domicilio" => "Domicilio",
    "Taxi" => "Taxi", "Expreso" => "Expreso", "Instalación" => "Instalación"
];
?>
<?php
$form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data', 'class' => 'noenter', 'autocomplete' => 'off'],
    'fieldConfig' => ['options' => ['class' => 'form-group form-group-sm']]
]);
?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-1">
                <br>
                <label>Fecha</label>
            </div>
            <div class="col-md-3">
                <?=
                    $form->field($lista, 'fecha')->widget(DatePicker::class, [
                        'removeButton' => false,
                        'options' => ['class' => 'form-control', 'style' => '', 'placeholder' => 'AAAA-MM-DD'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'startDate' => date('Y-m-d')
                        ]
                    ])->label(false)
                ?>
            </div>
            <div class="col-md-1">
            <br>
                <label>Notas</label>
            </div>
            <div class="col-md-7">
                <?=
                    $form->field($lista,'notas')->textInput(['class'=>'text-uppercase'])->label(false)
                ?>
            </div>
        </div>
        <br>
        <?php
        $invitados = [new Invitados];
        ?>
        <?=
            TabularInput::widget([
                'models' => $invitados,
                'theme' => 'bs',
                'rendererClass' => \unclead\multipleinput\renderers\TableRenderer::class,
                'addButtonOptions' => [
                    'class' => 'btn btn-sm btn-primary',
                    'label' => 'Agregar',
                ],
                'removeButtonOptions' => [
                    'class' => 'btn btn-sm btn-danger',
                    'label' => '<i class="glyphicon glyphicon-trash"></i>'
                ],
                'columns' => [
                    [
                        'name' => 'id',
                        'type' => unclead\multipleinput\MultipleInputColumn::TYPE_HIDDEN_INPUT
                    ],
                    [
                        'name' => 'nombres_invitado',
                        'title' => 'Nombres',
                        'options' => [
                            'class' => 'text-uppercase'
                        ]
                    ],
                    [
                        'name' => 'motivos',
                        'title' => 'Motivo(s)',
                        'type' => 'dropDownlist',
                        'items' => $listaOpciones,
                        'options' => [
                            'class' => 'text-uppercase'
                        ]
                    ],
                ]
            ])
        ?>
        <?php $form = ActiveForm::begin(); ?>

        <?php //$form->field($model, 'apellido_invitado')->textInput([]) 
        ?>

        <?php //$form->field($model, 'nombre_invitado')->textInput([]) 
        ?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-2"></div>
</div>
<?php ActiveForm::end(); ?>