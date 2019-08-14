<?php

use webvimark\modules\UserManagement\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\InvitadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invitados';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="panel panel-default" style="padding:10px">

    <p>
        <?= Html::a('Registrar Invitados&nbsp;&nbsp;&nbsp;<i class="material-icons">group_add</i>', 
        ['create'], ['class' => 'btn btn-success','style'=>'color:#fff !important']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',            
            [
                'label'=>'Apellidos Invitado',
                'value'=>function($data){
                    return strtoupper($data->apellido_invitado);
                }
            ],
            [
                'label'=>'Nombres Invitado',
                'value'=>function($data){
                    return strtoupper($data->nombre_invitado);
                }
            ],
            [
                'label'=>'Persona a visitar',
                'value'=>function($data){
                    $usuario = User::findOne($data->usuariofk);
                    return strtoupper($usuario->username);
                }
            ],
            //'created_at',
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
