<?php

use webvimark\modules\UserManagement\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\InvitadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invitados';
$this->params['breadcrumbs'][] = $this->title;
$isUsuario = \webvimark\modules\UserManagement\models\User::hasRole(['RESIDENTE']);
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="panel panel-default" style="padding:10px">

    <p>
        <?= \webvimark\modules\UserManagement\components\GhostHtml::a('Registrar Invitados&nbsp;&nbsp;&nbsp;<i class="material-icons">group_add</i>', ['create'], ['class' => 'btn btn-success', 'style' => 'color:#fff !important'])
        ?>
    </p>

    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',            
                [
                    'options' => [
                        'width' => '10%'
                    ],
                    'label' => 'Fecha',
                    'value' => function ($data) {
                        return date('Y-m-d', strtotime($data->fecha));
                    }
                ],
                [
                    'visible' => (!$isUsuario) ? true : false,
                    'options' => [
                        'width' => '10%'
                    ],
                    'label' => 'Etapa',
                    'value' => function ($data) {
                        //return $data->usuariofk;
                        $user = app\models\UserProfile::find()->where(['userid' => $data->usuariofk])->one();
                        $etapa = app\models\UrbanizacionEtapa::findOne($user->urbanizacion_etapafk);
                        return ($etapa) ? $etapa->etapa_nombre : '';
                    }
                ],
                [
                    'options' => [
                        'width' => '80%'
                    ],
                    'label' => 'Persona a visitar',
                    'value' => function ($data) {

                        $usuario = app\models\UserProfile::find()->where(['userid' => $data->usuariofk])->one();
                        return strtoupper($usuario->apellidos . ' ' . $usuario->nombres);
                    }
                ],
                [
                    'options' => [
                        'width' => '10%'
                    ],
                    'format' => 'raw',
                    'label' => '',
                    'value' => function ($data) {
                        return Html::a('Ver', ['view', 'id' => $data->id], ['class' => 'btn btn-sm btn-primary']);
                    }
                ]
                //'created_at',
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    ?>


</div>