<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

$this->title = "Lista de Invitados";
\yii\web\YiiAsset::register($this);
?>
<div class="invitados-view">

    <h2><?= Html::encode($this->title) ?></h2>
    <div class="panel panel-default" style="padding:10px">



        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                //'id',            
                [
                    'options' => [
                        'width' => '30%'
                    ],
                    'label' => 'Apellidos',
                    'value' => function($data) {
                        return strtoupper($data->apellido_invitado);
                    }
                ],
                    [
                    'options' => [
                        'width' => '30%'
                    ],
                    'label' => 'Nombres',
                    'value' => function($data) {
                        return strtoupper($data->nombre_invitado);
                    }
                ],
                    [
                    'options' => [
                        'width' => '40%'
                    ],
                    'label' => 'Persona a visitar',
                    'value' => function($data) {
                        $usuario = app\models\UserProfile::findOne($data->usuariofk);
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
