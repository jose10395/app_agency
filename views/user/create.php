<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Creación de Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h3><?= $this->title; ?></h3>

<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
        'perfil' => $perfil,
        //'roles' => $roles
    ]) ?>

</div>