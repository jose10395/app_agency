<?php

use app\models\Novedades;
use app\models\Urbanizacion;
use app\models\UrbanizacionEtapa;
use kartik\grid\GridView as KartikGridView;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\bootstrap\Html;
use app\components\MyComponent;

$this->title = 'Novedades';
$isMaster = \webvimark\modules\UserManagement\models\User::hasRole(['MASTER']);
$this->registerCssFile("@web/css/novedades.css");

?>

<div class="novedades-index">
    <h2><?= Html::encode($this->title) ?></h2>

    <div class="" style="padding:10px !important;">

        <div class="row" style="padding:5px !important;" >
            <div class="col-md-2 col-xs-12"></div>
            <div class="col-md-8 col-xs-12" style="background-color:transparent !important;">
                <p>
                    <?= GhostHtml::a('Nueva Novedad', ['create'], ['class' => 'btn btn-success', 'style' => 'color:white !important']) ?>
                </p>
                <?php foreach ($dataProvider->getModels() as $index => $data) : ?>
                    <?php
                        $fechaNotificacion = strtotime($data['created_at']);
                        $fechaActual = strtotime(date('Y-m-d H:i:s'));
                        $fechaaa = $fechaActual - $fechaNotificacion;
                        $etapa = UrbanizacionEtapa::findOne($data->urbanizacion_etapafk);
                        $urbanizacion = Urbanizacion::findOne($etapa->urbanizacionfk);
                        ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="titulo_novedad">
                                <span class="text-uppercase"><strong>nueva novedad</strong></span>
                                <span class="pull-right text-muted"><?= MyComponent::segToHoraDias($fechaaa); ?></span>
                            </div>
                            <div class="descripcion_novedad text-uppercase">
                                <?= $data['descripcion'] ?>
                            </div>
                            <?php if ($data['imagen'] != null || $data['imagen'] != '') : ?>
                                <div class="imagen_novedad text-center">
                                    <?= Html::a(Html::img("@web/" . $data['imagen'], []), '@web/' . $data['imagen'], ["data-fancybox" => ""]) ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($data['archivo'] != null || $data['archivo'] != '') : ?>
                                <div class="pdf_novedad text-right">
                                    <?= Html::a('<span class="text-muted">Archivo&nbsp;<i class="fa fa-file-pdf-o"></i></span>', ['/novedades/view', 'id' => $data['id']], []) ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($isMaster) : ?>
                                <div class="detalles_novedades">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-muted">
                                                <strong>Urbanización:</strong>&nbsp;<?= $urbanizacion->urbanizacion_nombre; ?>
                                            </span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span class="text-muted">
                                                <strong>Etapa:</strong>&nbsp;<?= $etapa->etapa_nombre; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($dataProvider->count == ($index + 1)) : ?>
                        <br><br>
                    <?php endif ?>
                <?php endforeach; ?>
            </div>
            <div class="col-md-2 col-xs-12"></div>
        </div>

        <?php
        KartikGridView::widget([
            'dataProvider' => $dataProvider,
            'headerRowOptions' => [
                'style' => [
                    //'background-color'=>'#ddd !important'
                ]
            ],
            'columns' => [
                [
                    'options' => [
                        'width' => '10%'
                    ],
                    'label' => 'Fecha',
                    'value' => function ($data) {
                        return date('Y-m-d', strtotime($data->created_at));
                    }
                ],
                [
                    'visible' => ($isMaster) ? true : false,
                    'label' => 'Urbanización',
                    'value' => function ($data) {
                        $etapa = UrbanizacionEtapa::findOne($data->urbanizacion_etapafk);
                        $urbanizacion = Urbanizacion::findOne($etapa->urbanizacionfk);
                        return $urbanizacion->urbanizacion_nombre;
                    }
                ],
                [
                    'visible' => ($isMaster) ? true : false,
                    'label' => 'Etapa',
                    'value' => function ($data) {
                        $etapa = UrbanizacionEtapa::findOne($data->urbanizacion_etapafk);
                        return $etapa->etapa_nombre;
                    }
                ],
                [
                    'label' => 'Descripción Novedad',
                    'attribute' => 'descripcion',
                    'options' => [
                        'width' => '40%'
                    ]
                ],
                [
                    'options' => [
                        'width' => '8%'
                    ],
                    'contentOptions' => [
                        'class' => 'text-center'
                    ],
                    'label' => '',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $buttons = Html::a(
                            '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                            ['view', 'id' => $data->id],
                            [
                                'target' => '_blank',
                                'class' => 'btn btn-xs btn-info',
                                'style' => 'color:white !important'
                            ]
                        );
                        return $buttons;
                    }
                ]
            ]
        ])
        ?>
    </div>
</div>