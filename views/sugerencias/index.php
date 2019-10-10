<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SugerenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sugerencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sugerencias-index">
    <h2><?= Html::encode($this->title) ?></h2>

    <div class="panel panel-default" style="padding:10px">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                //  ['class' => 'yii\grid\SerialColumn'],
                'id',
                    [
                    'label' => 'Fecha',
                    'value' => function($data) {
                        return date('Y-m-d', strtotime($data->created_at));
                    }
                ],
                    [
                    'label' => 'Etapa',
                    'value' => function($data) {
                        $user = app\models\UserProfile::find()->where(['userid' => $data->usuariofk])->one();
                        $etapa = app\models\UrbanizacionEtapa::findOne($user->urbanizacion_etapafk);
                        return $etapa->etapa_nombre;
                    }
                ],
                    [
                    'label' => 'Residente',
                    'value' => function($data) {
                        $user = app\models\UserProfile::find()->where(['userid' => $data->usuariofk])->one();
                        return strtoupper($user->apellidos.' '.$user->nombres);
                    }
                ],
                'asunto:ntext',
                'detalle:ntext',
                [
                    'format'=>'raw',
                    'header'=>'Adjunto',
                    'value'=>function($data){
                        $html="";
                        if($data->archivo !=null){
                            $ruta = Url::base(true).'/'.$data->archivo;
                            $html = Html::a('<i class="fa fa-picture-o" aria-hidden="true"></i>',$ruta,['class'=>'btn btn-flat btn-xs btn-primary','target'=>'_blank']);
                        }else{
                            $html="";
                        }
                        return $html;
                    }
                ]
            //'created_at',
            //      ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>        
    </div>
</div>
