<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use ramosisw\CImaterial\widgets\Menu;
use yii\helpers\Url;
use webvimark\modules\UserManagement\models\User;

$isMaster = User::hasRole(['MASTER']);

?>
<div id="navbar-wrapper" style="margin-top:0">
    <div class="container-fluid navbar" style="z-index:2;height:50px;">
        <?php if ($isHome) : ?>
            <div class="navbar-header" style="margin-left:0px !important">
                <a href="<?= Url::to(['/']) ?>" class="simple-text logo-normal" style="margin-left:10px !important;" id="logo-responsive">
                    <?= Html::img("@web/imgs/logo_slogan.png", ['width' => '140']) ?>
                </a>
            </div>
        <?php else: ?>
        <div class="navbar-header" style="display:none;margin-left:0px !important">
            <a href="<?= Url::to(['/']) ?>" class="simple-text logo-normal" style="margin-left:10px !important;" id="logo-responsive">
                <?= Html::img("@web/imgs/logo_slogan.png", ['width' => '140']) ?>
            </a>
            <a href="#" class="navbar-brand" id="sidebar-toggle" style="margin-right:20px !important;"><i class="fa fa-bars"></i></a>
        </div>
        <?php endif;?>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-right:0px !important">
                <?php if (Yii::$app->user->issuperadmin) : ?>
                    <li>
                        <a href="<?= Url::to(['/site/admin']) ?>" class="dropdown" title="Parámetros">
                            <i class="material-icons">build</i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Usuarios">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><?= Html::a('Usuarios', ['/user-management/user']) ?></li>
                            <li><?= Html::a('Roles', ['/user-management/role/index']) ?></li>
                            <li><?= Html::a('Permisos', ['/user-management/permission/index']) ?></li>
                            <li><?= Html::a('Grupos de Permisos', ['/user-management/auth-item-group/index']) ?></li>
                            <li><?= Html::a('Visit Log', ['/user-management/user-visit-log/index']) ?></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="<?= ($isMaster ? 'hide' : '') ?>">
                    <a href="<?= Url::to(['/site/cuenta']) ?>" class="dropdown" title="Estado de cuenta">
                        
                        <h4 class="font-light counter m-b-0">
                        Estado de Cuenta&nbsp;&nbsp;&nbsp;<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </h4>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Opciones de Usuario">
                        <h4 class="font-light counter m-b-0">
                            <?= Yii::$app->user->identity->username ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-user-circle" aria-hidden="true"></i>
                        </h4>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <?= Html::a('<span style="font-size:14px">Cambiar Contraseña</span>', ['/user-management/user/change-password', 'id' => Yii::$app->user->getId()]) ?>
                        </li>
                        <li>
                            <?= Html::a('<span style="font-size:14px">Salir</span>&nbsp;<i style="font-size:18px" class="fa fa-sign-in pull-right"></i>', ['/site/logout', ['linkOptions' => ['data-method' => 'post']]]) ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        
    </div>
</div>