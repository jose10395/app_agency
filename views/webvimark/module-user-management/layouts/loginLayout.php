<?php

use app\assets\AppAsset;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\BootstrapPluginAsset;


$this->title = UserManagementModule::t('front', 'Authorization');
$ruta_favicon = Url::base(true) . '/favicondcl.ico';
BootstrapAsset::register($this);
BootstrapPluginAsset::register($this);

$this->registerCssFile("@web/css/login.css");

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<meta charset="<?= Yii::$app->charset ?>" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="<?= $ruta_favicon ?>">
	<?= Html::csrfMetaTags() ?>
	<title>DCL II APP</title>
	<?php $this->head() ?>
</head>

<body>
	<?php $this->beginBody() ?>

	<nav class="navbar navbar-default" style="border-radius:0px !important;background-color:white">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?= Html::img("@web/imgs/logo.png", ['width' => '50px', 'height' => '50px', 'style' => 'padding:5px;', 'class' => 'navbar-brand']) ?>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li>
						<p class="text-muted" style="margin-top:16px;margin-left:25px;font-weight:bold;color:#767575;">Bienvenido a DCL App. Una manera segura e innovadora para administrar su proyecto inmobiliario</p>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="https://dcl.ec/" class="text-muted" target="_blank"><b>IR A WEB</b></a></li>
				</ul>
			</div>
		</div>
	</nav>

	<?= $content ?>
	<!--footer-->
	<footer class="footer" style="background-color: white;  position: fixed;  bottom: 0;  width: 100%;  height: 45px; color: #767575;">
		<div class="container-fluid">
			<div class="copyright" style="text-align:center;margin-top:15px;font-weight:bold;">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-4 col-xs-12 col-sm-3" id="footer-copyright">
						Todos los derechos reservados
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>.
					</div>
					<div class="col-md-3 col-xs-12 col-sm-3" id="footer-by">
						Hecho por&nbsp;&nbsp;<a href="http://www.jp-agenciadigital.com/" target="_blank"><?= Html::img("@web/imgs/LOGOJPHORIZONTALnegro.png", ['height' => '18']) ?></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--footer-->

	<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>