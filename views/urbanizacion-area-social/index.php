<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UrbanizacionAreaSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Urbanizacion Area Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urbanizacion-area-social-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Urbanizacion Area Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'urbanizacion_etapafk',
            'nombre:ntext',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
