<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

$this->title = "Lista de Invitados";
\yii\web\YiiAsset::register($this);
$isMaster = \webvimark\modules\UserManagement\models\User::hasRole(['MASTER']);
?>
<div class="invitados-view">

    <h2><?= Html::encode($this->title) ?></h2>
    <div class="panel panel-default" style="padding:10px">



        <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'options' => [
                        'width' => '2%'
                    ],],
                    //'id',            
                    [
                        'options' => [
                            'width' => '30%'
                        ],
                        'label' => 'Nombres Invitado',
                        'value' => function ($data) {
                            return strtoupper($data->nombres_invitado);
                        }
                    ],
                        [
                        'options' => [
                            'width' => '30%'
                        ],
                        'label' => 'Motivo(s)',
                        'value' => function($data) {
                            return strtoupper($data->motivos);
                        }
                    ],
                    [
                        'visible' => ($isMaster) ? true : false,
                        'options' => [
                            'width' => '40%'
                        ],
                        'label' => 'Persona a visitar',
                        'value' => function ($data) {
                            $usuario = app\models\UserProfile::find()->where(['userid' => $data->usuariofk])->one();
                            return strtoupper($usuario->apellidos . ' ' . $usuario->nombres);
                        }
                    ],
                    //'created_at',
                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        ?>
    </div>
</div>