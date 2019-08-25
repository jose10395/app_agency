<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
$isUsuario = \webvimark\modules\UserManagement\models\User::hasRole(['RESIDENTE']);
?>
<div class="reservas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="panel panel-default" style="padding: 10px !important">
        <p>
            <?= \webvimark\modules\UserManagement\components\GhostHtml::a('Nueva Reserva', ['create'], ['class' => 'btn btn-success','style'=>'color:white !important']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                //'id',
                'nro',
                    [
                    'visible' => (!$isUsuario) ? true : false,
                    'label' => 'Etapa',
                    'value' => function($data) {
                        $user = app\models\UserProfile::find()->where(['userid' => $data->usuariofk])->one();
                        $etapa = app\models\UrbanizacionEtapa::findOne($user->urbanizacion_etapafk);
                        return $etapa->etapa_nombre;
                    }
                ],
                    [
                    'visible' => (!$isUsuario) ? true : false,
                    'label' => 'Usuario',
                    'value' => function($data) {
                        $user = app\models\UserProfile::find()->where(['userid' => $data->usuariofk])->one();
                        return $user->apellidos.' '.$user->nombres;
                    }
                ],
                    [
                    'label' => 'Area Social',
                    'value' => function($data) {
                        $area_social = app\models\UrbanizacionAreaSocial::findOne($data->urbanizacion_area_socialfk);
                        return $area_social->nombre;
                    }
                ],
                [
                    'label'=>'Fecha',
                    'value'=>function($data){
                        return date('Y-m-d',strtotime($data->fecha_reserva));
                    }
                ],
                [
                    'label'=>'Hora Inicio',
                    'value'=>function($data){
                        return date('H:i',strtotime($data->hora_inicio));
                    }
                ],
                [
                    'label'=>'Hora Inicio',
                    'value'=>function($data){
                        return date('H:i',strtotime($data->hora_fin));
                    }
                ]
            //'celular',
            //'created_at',
            //['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>
