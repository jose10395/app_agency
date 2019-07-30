<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use ramosisw\CImaterial\widgets\Menu;
use rmrevin\yii\fontawesome\FontAwesome;

?>
<form class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= $this->title ?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                    </a>
                </li> -->
                
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-users" aria-hidden="true"></i>                        
                    </a>
                    <ul class="dropdown-menu">
                        <li><?= Html::a('Usuarios', ['/user-management/user']) ?></li>
                        <li><?= Html::a('Roles', ['/user-management/role/index']) ?></li>
                        <li><?= Html::a('Permisos', ['/user-management/permission/index']) ?></li>
                        <li><?= Html::a('Grupos de Permisos', ['/user-management/auth-item-group/index']) ?></li>
                        <li><?= Html::a('Visit Log', ['/user-management/user-visit-log/index']) ?></li>
                    </ul>
                </li>                 -->
                <li>
                    <?= Html::a('<span style="font-size:14px">Salir</span>&nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i>', ['/site/logout', ['linkOptions' => ['data-method' => 'post']]]) ?>
                </li>
            </ul>
        </div>
    </div>
</form>