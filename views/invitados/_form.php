<?php

use app\models\Invitados;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \unclead\multipleinput\TabularInput;
use yii\bootstrap\BootstrapAsset;
use kartik\widgets\DatePicker;
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
                <label><strong>Fecha</strong></label>    
            </div>
            <div class="col-md-3">
                <?=
                $form->field($lista, 'fecha')->widget(DatePicker::class, [
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd/mm/yyyy',
                    ],
                    'options' => ['class' => 'form-control', 'style' => '', 'placeholder' => 'aaaa-mm-dd'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ])->label(false)
                ?>
            </div>
        </div>
        <br>
        <?php
        // $familiar = Familiar::find()->where(['empleadofk' => $model->id])->all();
        // if ($familiar == null) {
        //     $familiar = [new Familiar];
        // }
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
                //     [
                //     'name' => 'cedula_invitado',
                //     'title' => 'Cédula',
                //     'options' => [
                //         'class' => 'text-uppercase'
                //     ],
                //     'headerOptions' => [
                //         'style' => [
                //             'margin-bottom' => '20px !important',
                //         ]
                //     ]
                // ],
                //     [
                //     'name' => 'apellido_invitado',
                //     'title' => 'Apellidos',
                //     'options' => [
                //         'class' => 'text-uppercase'
                //     ]
                // ],
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