<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use ramosisw\CImaterial\widgets\Menu;

?>
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <div class="logo">
            <a href="<?= Url::to(['/']) ?>" class="simple-text logo-normal">
                <?= Html::img("@web/imgs/logo_slogan.png", ['width' => '140']) ?>
            </a>
        </div>
    </div>
    <?=
        Menu::widget([
            'options' => [
                'class' => 'sidebar-nav',
                'style' => [
                    'margin-top' => '15px !important'
                ]
            ],
            'encodeLabels' => false,
            'linkTemplate' => '<a class="nav-link" href="{url}"><div class="row">                               
                                <div class="col-md-2 col-xs-2" style="margin-top:10px;"><i class="material-icons pull-left">{icon}</i></div>
                                <div class="col-md-9 col-xs-8" style="margin-top:12px !important">{label}</></div></div></a>',
            'submenuTemplate' => "\n<ul class='nav tree' {show}>\n{items}\n</ul>\n",
            'items' => [
                ['label' => 'Inicio', 'url' => ['/site/index'], 'icon' => 'home'],
                ['label' => 'Etapas', 'url' => ['/urbanizacion-etapa'], 'icon' => 'dashboard'],
                ['label' => 'Usuarios', 'url' => ['/user-management/user'], 'icon' => 'account_circle'],
                ['label' => 'Listado de Invitados', 'url' => ['/invitados'], 'icon' => 'list_alt'],
                [
                    'label' => 'Reservas', 'url' => ['/'], 'icon' => 'event_available',
                    'template' => '<a class="tree-toggle" href="{url}"><div class="row">                               
                                <div class="col-md-2 col-xs-2" style="margin-top:10px;"><i class="material-icons pull-left">{icon}</i></div>
                                <div class="col-md-8 col-xs-8" style="margin-top:8px !important">{label}</div>
                                <div class="col-md-1 col-xs-1"><span style="margin-left:-60px;"><i class="material-icons">arrow_drop_down</i></span></div>
                                </div></a>',
                    'items' => [
                        ['label' => 'Canchas', 'url' => ['/site/canchas'], 'icon' => 'note_add'],
                        ['label' => 'Area Social', 'url' => ['/site/areasocial'], 'icon' => 'group'],
                    ]
                ],
                ['label' => 'Estado de Cuenta', 'url' => ['/site/cuenta'], 'icon' => 'credit_card'],
                [
                    'label' => 'Revisar', 'url' => ['/'], 'icon' => 'assignment_turned_in',
                    'template' => '<a class="tree-toggle" href="{url}"><div class="row">                               
                                <div class="col-md-2 col-xs-2" style="margin-top:10px;"><i class="material-icons pull-left">{icon}</i></div>
                                <div class="col-md-8 col-xs-8" style="margin-top:8px !important">{label}</div>
                                <div class="col-md-1 col-xs-1"><span style="margin-left:-60px;"><i class="material-icons">arrow_drop_down</i></span></div>
                                </div></a>',
                    'items' => [
                        ['label' => 'Ingresos y Gastos', 'url' => ['/site/about'], 'icon' => 'business_center'],
                        ['label' => 'Eventos en Etapa', 'url' => ['/site/about'], 'icon' => 'assignment'],
                    ]
                ],
                ['label' => 'Pagos', 'url' => ['/site/pagos'], 'icon' => 'attach_money'],
                ['label' => 'Sugerencias', 'url' => ['/site/contact'], 'icon' => 'feedback'],
                ['label' => 'Salir','url'=>['site/logout'],'icon'=>'meeting_room',['data-method'=>'post']]                
            ],
        ]);
    ?>
</aside>