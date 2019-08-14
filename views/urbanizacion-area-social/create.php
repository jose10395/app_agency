<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UrbanizacionAreaSocial */

$this->title = 'Create Urbanizacion Area Social';
$this->params['breadcrumbs'][] = ['label' => 'Urbanizacion Area Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urbanizacion-area-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
