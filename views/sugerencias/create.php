<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */

$this->title = 'Create Sugerencias';
$this->params['breadcrumbs'][] = ['label' => 'Sugerencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sugerencias-create">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="panel panel-default" style="padding:10px">

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
