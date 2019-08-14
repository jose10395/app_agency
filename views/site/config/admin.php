<?php
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="aqua">
                <i class="material-icons">location_city</i>
            </div>
            <div class="card-content">
                <p class="category">Urbanizaciones</p>
                <h3 class="card-title"><?=$urbanizaciones?></h3>
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
                <h3 class="card-title"><?=$etapas?></h3>
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
                <h3 class="card-title"><?=$areas_sociales?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i> <a href="<?= Url::to(['/urbanizacion-area-social']) ?>">Configurar</a>
                </div>
            </div>
        </div>
    </div>
</div> 