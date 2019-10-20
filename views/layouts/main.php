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

$opciones_inicio = [
    '/web/index.php/site/index',
    '/dcl/web/index.php/site/index',
    '/web/index.php',
    '/web/index.php/',
    '/dcl/web/index.php',
    '/dcl/web/index.php/',
];
$url_request = Yii::$app->request->url;
$isHome = in_array($url_request,$opciones_inicio);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="./favicondcl.ico">
    <?php $this->registerCssFile("@web/css/fancybox.min.css") ?>
    <?php $this->registerCsrfMetaTags() ?>
    <!-- <title><?= Html::encode($this->title) ?></title> -->
    <title>DCL II APP</title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <?php if($isHome):?>
    <div>            
        <div class="main-panel" style="width:100% !important;z-index:1;height:650px;overflow:auto;">
        <?= $this->render('_nav', ['isHome'=>$isHome]); ?>        
            <div class="content" style="padding:0px !important;">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->render('_footer_home', []); ?>
    <?php else:?>
    <div id="wrapper">            
        <?= $this->render('_sidebar', []); ?>
        <div class="main-panel" style="width:100% !important;z-index:1;height:650px;overflow:auto;">
        <?= $this->render('_nav', ['isHome'=>$isHome]); ?>
            <div class="content" style="padding:0px !important;">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->render('_footer', []); ?>
    <?php endif;?>

    <?php $this->endBody() ?>
</body>
<?php $this->registerJsFile("@web/js/fancybox.min.js")?>
</html>
<?php $this->endPage() ?>