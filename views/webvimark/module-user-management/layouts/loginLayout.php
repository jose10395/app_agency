<?php

use app\assets\AppAsset;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */

$this->title = UserManagementModule::t('front', 'Authorization');
BootstrapAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
	<meta charset="<?= Yii::$app->charset ?>" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title>DCL II APP</title>
	<?php $this->head() ?>
</head>

<body>
	<?php $this->beginBody() ?>
	<div class="panel" style="border-radius: 0px !important;height:55px;">
		<div class="container" style="padding:0px">
			<div class="col-md-1">
				<?= Html::img("@web/imgs/logo.png", ['width' => '50px', 'height' => '50px', 'style' => 'padding:5px;margin-left:-80px;']) ?>
			</div>
			<div class="col-md-9">
				<p class="text-muted" style="margin-top:16px;margin-left:-110px;font-weight:bold;color:#767575;">Bienvenido a DCL App. Una manera segura e innovadora para administrar su proyecto inmobiliario</p>
			</div>
			<div class="col-md-1 pull-right" style="margin-right:-40px;">
				<p class="text-muted" style="margin-top:15px;"><a href="https://dcl.ec/" class="text-muted" target="_blank"><b>IR A WEB</b></a></p>
			</div>
		</div>
	</div>
	<?= $content ?>

	<footer class="footer" style="background-color: white;  position: absolute;  bottom: 0;  width: 100%;  height: 45px; color: #767575;">
		<div class="container-fluid">			
			<div class="copyright" style="text-align:center;margin-top:15px;font-weight:bold;">
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