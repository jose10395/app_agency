<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'DCL II APP';
?>
<div class="row">
    <h2 style="margin:0px !important;font-family:'Modern No. 20'" class="text-center">Bienvenido <strong><?= Yii::$app->user->identity->username ?></strong> a APP DCL</h2>
</div>
<hr>
<!-- <div class="row">
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">content_copy</i>
            </div>
            <div class="card-content">
                <p class="category">Used Space</p>
                <h3 class="card-title">49/50<small>GB</small></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i> <a href="#pablo">Get More Space...</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-tabs" data-background-color="blue">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Tasks:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="active">
                                <a href="#profile" data-toggle="tab">
                                    <i class="material-icons">bug_report</i>
                                    First
                                    <div class="ripple-container"></div></a>
                            </li>
                            <li class="">
                                <a href="#messages" data-toggle="tab">
                                    <i class="material-icons">code</i>
                                    Second
                                    <div class="ripple-container"></div></a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab">
                                    <i class="material-icons">cloud</i>
                                    Third
                                    <div class="ripple-container"></div></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        First Tab
                    </div>
                    <div class="tab-pane" id="messages">
                        Second Tab
                    </div>
                    <div class="tab-pane" id="settings">
                        Third Tab
                    </div>
                </div>
            </div>

        </div>

    </div>
</div> -->
<!-- <div class="row">
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="aqua">
                <i class="material-icons">location_city</i>
            </div>
            <div class="card-content">
                <p class="category">Urbanizaciones</p>
                <h3 class="card-title"><?= $urbanizaciones ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i> <a href="<?= Url::to(['/urbanizacion']) ?>">Configurar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="aqua">
                <i class="material-icons">dashboard</i>
            </div>
            <div class="card-content">
                <p class="category">Etapas</p>
                <h3 class="card-title"><?= $etapas ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i> <a href="<?= Url::to(['/urbanizacion-etapa']) ?>">Configurar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="aqua">
                <i class="material-icons">group</i>
            </div>
            <div class="card-content">
                <p class="category">Áreas Sociales</p>
                <h3 class="card-title"><?= $areas_sociales ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i> <a href="<?= Url::to(['/urbanizacion-area-social']) ?>">Configurar</a>
                </div>
            </div>
        </div>
    </div>
</div>  -->