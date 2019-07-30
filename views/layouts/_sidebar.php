<?php
use yii\bootstrap\Html;
use yii\helpers\Url;
use ramosisw\CImaterial\widgets\Menu;

?>
<div style="height:100%" class="sidebar" data-color="rose" data-background-color="white" data-image="<?= Yii::$app->request->baseUrl ?>/imgs/sidebar-3.jpg">
    <div class="logo">
        <a href="<?= Url::to(['/']) ?>" class="simple-text logo-normal">
            <?= Html::img("@web/imgs/logo_slogan.png",['width'=>'140']) ?>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <?=
            Menu::widget([
                'options' => [
                    'class' => 'nav',
                ],
                'encodeLabels' => false,
                'linkTemplate' => '<a class="nav-link" href="{url}">                                
                                <i class="material-icons">{icon}</i>
                            <p class="text-primary">{label}</p></a>',
                'items' => [
                    ['label' => 'Inicio', 'url' => ['/site'], 'icon' => 'home'],
                    ['label' => 'Etapas', 'url' => ['/site/about'], 'icon' => 'dashboard'],
                    ['label' => 'Usuarios', 'url' => ['/user-management/user'], 'icon' => 'account_circle'],
                    ['label' => 'Listado de Invitados', 'url' => ['/site/about'], 'icon' => 'list_alt'],
                    [
                        'label' => 'Reservas', 'url' => ['/'],
                        'items' => [
                            ['label' => 'Canchas', 'url' => ['/site/about'], 'icon' => 'note_add'],
                            ['label' => 'Area Social', 'url' => ['/site/about'], 'icon' => 'group'],
                        ]
                    ],
                    ['label' => 'Estado de Cuenta', 'url' => ['/site/about'], 'icon' => 'credit_card'],
                     [
                        'label' => 'Revisar', 'url' => ['/'],
                        'items' => [
                            ['label' => 'Ingresos y Gastos', 'url' => ['/site/about'], 'icon' => 'business_center'],
                            ['label' => 'Eventos en Etapa', 'url' => ['/site/about'], 'icon' => 'assignment'],
                        ]
                    ],
                    ['label' => 'Pagos', 'url' => ['/site/about'], 'icon' => 'attach_money'],
                    ['label' => 'Sugerencias', 'url' => ['/site/about'], 'icon' => 'feedback'],
                ],
            ]);
        ?>
    </div>
</div>