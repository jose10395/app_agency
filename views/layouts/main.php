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

//AppAsset::register($this);
AppAsset::register($this);
if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
    ramosisw\CImaterial\web\MaterialAsset::register($this);
}
$background = Url::base() . '/imgs/guayaquil.jpg';
$css = <<<CSS
html, body {
	background: #eee;	
	z-index: 1;	
	background-image : url($background);	
	background-size: cover !important;
	-webkit-background-size: cover !important;
    -moz-background-size: cover !important;
	-o-background-size: cover !important;	
	font-family: 'Century Gothic'
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

<body style="height:100%;overflow-y:hidden">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?= $this->render('_sidebar', []); ?>
        <div class="main-panel">
            <?= $this->render('_nav', []); ?>
            <div class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </div>            
        </div>
    </div>
    <footer class="footer" style="background-color: white;  position: absolute;  bottom: 0;  width: 100%;  height: 45px; color: #767575;">
		<div class="container-fluid">			
			<div class="copyright" style="text-align:center;margin-top:-18px;font-weight:bold;margin-left:180px">
				Todos los derechos reservados
				&copy;
				<script>
					document.write(new Date().getFullYear())
				</script>. Hecho por&nbsp;&nbsp;<a href="http://www.jp-agenciadigital.com/" target="_blank"><?= Html::img("@web/imgs/LOGOJPHORIZONTALnegro.png",['height'=>'18'])?></a>
			</div>
		</div>
	</footer>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>