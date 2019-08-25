<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use ramosisw\CImaterial\widgets\Menu;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\models\User;

$isUsuario = User::hasRole(['RESIDENTE']);
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
    GhostMenu::widget([
        'encodeLabels' => false,
        'activateItems' => true,
        'activateParents' => true,
        'options' => [
            'class' => 'sidebar-nav',
            'style' => [
                'margin-top' => '15px !important'
            ]
        ],
        'linkTemplate' => '<a class="nav-link" href="{url}"><div class="row">
                                <div class="col-md-12 col-xs-12" style="margin-top:12px !important">{label}</></div></div></a>',
        'submenuTemplate' => "\n<ul class='nav tree' {show}>\n{items}\n</ul>\n",
        'items' => [
                ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">home</i>Inicio', 'url' => ['/site/index'], 'icon' => 'home'],
                ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">assignment</i>Novedades', 'url' => ['/novedades/index'], 'icon' => 'dashboard'],
                ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">dashboard</i>Etapas', 'url' => ['/urbanizacion-etapa/index'], 'icon' => 'dashboard'],
                ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">account_circle</i>Usuarios', 'url' => ['/user-management/user/'], 'icon' => 'account_circle'],
                ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">list_alt</i>Listado de Invitados', 'url' => ['/invitados/index'], 'icon' => 'list_alt'],
                ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">event_available</i>Reservas', 'url' => ['/reservas/index'], 'icon' => 'list_alt'],
            // [
            //     'label' => 'Reservas', 'url' => ['/'], 'icon' => 'event_available',
            //     'template' => '<a class="tree-toggle" href="{url}"><div class="row">                               
            //                 <div class="col-md-2 col-xs-2" style="margin-top:10px;"><i class="material-icons pull-left">{icon}</i></div>
            //                 <div class="col-md-8 col-xs-8" style="margin-top:8px !important">{label}</div>
            //                 <div class="col-md-1 col-xs-1"><span style="margin-left:-60px;"><i class="material-icons">arrow_drop_down</i></span></div>
            //                 </div></a>',
            //     'items' => [
            //         ['label' => 'Canchas', 'url' => ['/site/canchas'], 'icon' => 'note_add'],
            //         ['label' => 'Area Social', 'url' => ['/site/areasocial'], 'icon' => 'group'],
            //     ]
            // ],
            ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">credit_card</i>Estado de Cuenta', 'url' => ['/site/cuenta'], 'icon' => 'credit_card'],
            // [
            //     'label' => 'Revisar', 'url' => ['/'], 'icon' => 'assignment_turned_in',
            //     'template' => '<a class="tree-toggle" href="{url}"><div class="row">                               
            //                 <div class="col-md-2 col-xs-2" style="margin-top:10px;"><i class="material-icons pull-left">{icon}</i></div>
            //                 <div class="col-md-8 col-xs-8" style="margin-top:8px !important">{label}</div>
            //                 <div class="col-md-1 col-xs-1"><span style="margin-left:-60px;"><i class="material-icons">arrow_drop_down</i></span></div>
            //                 </div></a>',
            //     'items' => [
            //         ['label' => 'Ingresos y Gastos', 'url' => ['/site/about'], 'icon' => 'business_center'],
            //         ['label' => 'Eventos en Etapa', 'url' => ['/site/about'], 'icon' => 'assignment'],
            //     ]
            // ],
            // ['label' => 'Pagos', 'url' => ['/site/pagos'], 'icon' => 'attach_money'],
            ($isUsuario) ? ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">feedback</i>Sugerencias', 'url' => ['/sugerencias/create'], 'icon' => 'feedback'] : ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">feedback</i>Sugerencias', 'url' => ['/sugerencias/index'], 'icon' => 'feedback'],
            ['label' => '<i class="material-icons pull-left" style="margin-top:5px !important;margin-bottom:12px !important">meeting_room</i>Salir', 'url' => ['site/logout'], 'icon' => 'meeting_room', ['data-method' => 'post']]
        ],
    ]);
    ?>
</aside>