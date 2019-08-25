<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use ramosisw\CImaterial\widgets\Menu;
use app\assets\AppAsset;

AppAsset::register($this);
if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
    ramosisw\CImaterial\web\MaterialAsset::register($this);
}
$background = Url::base() . '/imgs/guayaquil.jpg';
$css = <<<CSS
html, body {
    font-family: 'Century Gothic' !important;
	background: #eee;		
    background: url($background) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100%;
    overflow: hidden;	
}
CSS;

$this->registerCss($css);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="favicondcl.ico">

    <?php $this->registerCsrfMetaTags() ?>
    <!-- <title><?= Html::encode($this->title) ?></title> -->
    <title>DCL II APP</title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div id="wrapper">
        <?= $this->render('_sidebar', []); ?>
        <div id="navbar-wrapper">
            <nav class="navbar">
                <div class="container-fluid" style="z-index:2">
                    <div class="navbar-header" style="display:none;">
                        <a href="<?= Url::to(['/']) ?>" class="simple-text logo-normal" style="margin-left:10px !important;" id="logo-responsive">
                            <?= Html::img("@web/imgs/logo_slogan.png", ['width' => '140']) ?>
                        </a>
                        <a href="#" class="navbar-brand" id="sidebar-toggle" style="margin-right:10px !important;"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (Yii::$app->user->issuperadmin) : ?>
                            <li>
                                <a href="<?= Url::to(['/site/admin']) ?>" class="dropdown">
                                    <i class="material-icons">build</i>
                                </a>
                            </li>
                            <li class="dropdown">
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
                            </li>
                            <?php endif; ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?= Html::a('<span style="font-size:14px">Cambiar Contraseña</span>', ['/user-management/user/change-password','id'=>Yii::$app->user->getId()]) ?>
                                    </li>
                                    <li>
                                        <?= Html::a('<span style="font-size:14px">Salir</span>&nbsp;<i style="font-size:18px" class="fa fa-sign-in pull-right"></i>', ['/site/logout', ['linkOptions' => ['data-method' => 'post']]]) ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="main-panel" style="width:100%;z-index:1;height:600px;overflow:auto">
            <div class="content" style="padding:0px !important;">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->render('_footer', []); ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>