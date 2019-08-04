<?php

/**
 * @var $this yii\web\View
 * @var $model webvimark\modules\UserManagement\models\forms\LoginForm
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container" id="login-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<!-- <div class="panel-heading">
					<h3 class="panel-title"><?php //UserManagementModule::t('front', 'Authorization') 
											?></h3>
				</div> -->
				<div class="panel-body">
					<div style="text-align:center">
						<h3><b>Ingreso al Sistema</b></h3>
						<h4>Bienvenido a DCL APP</h4>
						<?= Html::img("@web/imgs/logo.png") ?>
					</div>
					<br>
					<?php $form = ActiveForm::begin([
						'id'      => 'login-form',
						'options' => ['autocomplete' => 'off'],
						'validateOnBlur' => false,
						'fieldConfig' => [
							'template' => "{input}\n{error}",
						],
					]) ?>
					<label style="color: #767575;">Usuario&nbsp;<span style="color:red;">*</span></label>
					<?= $form->field($model, 'username')
						->textInput(['placeholder' => 'Usuario', 'autocomplete' => 'off']) ?>

					<label style="color: #767575;">Clave&nbsp;<span style="color:red;">*</span></label>
					<?= $form->field($model, 'password')
						->passwordInput(['placeholder' => 'Clave', 'autocomplete' => 'off']) ?>

					<?php (isset(Yii::$app->user->enableAutoLogin) && Yii::$app->user->enableAutoLogin) ? $form->field($model, 'rememberMe')->checkbox(['value' => true]) : '' ?>
					<center>
						<?= Html::submitButton(
							/*UserManagementModule::t('front', 'Login')*/
							'Entrar',
							['class' => 'btn btn-md btn-primary btn-block', 'style' => 'background-color:#7e0407 !important;border-color:#7e0407;width:130px;border-radius:30px;height:40px']
						) ?>
					</center>
					<div class="row registration-block">
						<div class="col-sm-6">
							<?= GhostHtml::a(
								UserManagementModule::t('front', "Registration"),
								['/user-management/auth/registration']
							) ?>
						</div>
						<div class="col-sm-6 text-right">
							<?= GhostHtml::a(
								UserManagementModule::t('front', "Forgot password ?"),
								['/user-management/auth/password-recovery']
							) ?>
						</div>
					</div>
					<?php ActiveForm::end() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$background = Url::base() . '/imgs/fondo_app_login.jpg';
$css = <<<CSS
html, body {
	background: #eee;
	/* -webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
	box-shadow: inset 0 0 100px rgba(0,0,0,.5); */
	height: 100%;
	/*width: 100%; */
	/* position: relative; */	
	z-index: 1;	
	background-image : url($background) ;	
	background-size: contain !important;
	background-repeat: no-repeat;
	-webkit-background-size: cover !important;
    -moz-background-size: cover !important;
	-o-background-size: cover !important;	
	font-family: 'Century Gothic'
}
#login-wrapper {
	position: relative;
	top: 8%;
}
#login-wrapper .registration-block {
	margin-top: 15px;
}
CSS;

$this->registerCss($css);
?>