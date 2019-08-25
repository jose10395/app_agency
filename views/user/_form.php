<?php

use app\models\UrbanizacionEtapa;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use yii\bootstrap\Html as YiiHtml;

$etapas = UrbanizacionEtapa::find()->all();
$listaetapas = ArrayHelper::map($etapas, 'id', 'etapa_nombre');

$roles = Role::find()->all();
$listaroles = ArrayHelper::map($roles, 'name', 'name');

$status = [1 => 'Activo', 0 => 'Inactivo'];
//print_r($listaroles);
//return;

?>

<div class="panel panel-default">
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <div class="panel-body">

        <?php if (User::hasRole('Admin')) : ?>
        <?php //$form->field($model->loadDefaultValues(), 'status')->dropDownList($status) 
            ?>

        <div class="form-group">
            <label class="col-sm-3">Tipo Usuario</label>
            <div class="col-sm-6">
            <?= Html::dropDownList('rol_usuario', null, $listaroles, ['class' => 'form-control']) ?>
            </div>
        </div>


        <?= $form->field($perfil, 'urbanizacion_etapafk')->dropDownList($listaetapas, ['prompt' => '-- Seleccione --'])->label('Etapa') ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label("Usuario") ?>

        <?php endif ?>

        <?= $model->isNewRecord  ? $form->field($model, 'password')->input('password', ['maxlength' => true]) : '' ?>

        <?= $model->isNewRecord  ? $form->field($model, 'repeat_password')->input('password', ['maxlength' => true]) : '' ?>

        <?= $form->field($perfil, 'nombres')->textInput(['maxlength' => true]) ?>

        <?= $form->field($perfil, 'apellidos')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($perfil, 'celular')->textInput(['maxlength' => true]) ?>

        <?= $form->field($perfil, 'telefono')->textInput(['maxlength' => true]) ?>

        <?= $form->field($perfil, 'direccion')->textarea(['maxlength' => true]) ?>


    </div>
    <div class="box-footer">
        <?php if ($model->isNewRecord) : ?>
        <?= Html::submitButton('<span class="glyphicon glyphicon-plus-sign"></span> Crear ', ['class' => 'btn btn-success btn-flat']) ?>
        <?php else : ?>
        <?= Html::submitButton(' Actualizar ', ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>