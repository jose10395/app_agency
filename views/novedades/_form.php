<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;

?>

<div class="novedades-form">
    <div class="row" style="margin:0 !important">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'descripcion')->textInput() ?>

        <div class=" form-group">
            <label class="col-sm-3">Urbanización:</label>
            <div class="col-sm-6">
                <?= Html::dropDownList('urbanizacion', null, $urbanizacion_list, ['id' => 'urbanizacion', 'class' => 'form-control', 'prompt' => '-- seleccione --']) ?>
            </div>
        </div>

        <div class=" form-group">
            <label class="col-sm-3">Etapa:</label>
            <div class="col-sm-6">
                <?=
                    DepDrop::widget([
                        'type' => DepDrop::TYPE_SELECT2,
                        'model' => $model,
                        'attribute' => 'urbanizacion_etapafk',
                        'options' => ['prompt' => '--'],
                        //'data' => $dataCentroCosto,
                        'pluginOptions' => [
                            'depends' => ['urbanizacion'],
                            'placeholder' => '-- Seleccione --',
                            'url' => Url::to(['/site/etapas'])
                        ],
                        'select2Options' => [
                            //'size' => 'sm',
                            'options' => ['placeholder' => '--'],
                        ]
                    ])
                ?>
            </div>
        </div>

        
        <?=
            $form->field($model, 'archivo')->widget(FileInput::classname(), [
                'options' => ['accept' => 'application/pdf'],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]);
        ?>
        <?=
            $form->field($model, 'imagen')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ])->label('Imagen', ['style' => 'font-size:14px']);
        ?>

        <div class=" form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>