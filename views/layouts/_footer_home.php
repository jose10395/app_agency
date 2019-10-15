<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<footer class="footer" style="background-color: white;  position: fixed;  bottom: 0px;  width: 100%;  height: 6%; color: #767575;z-index:2">
    <div class="container-fluid">
        <div class="copyright" style="text-align:center;margin-top:-18px;font-weight:bold;">
            <div class="row">                
                    Todos los derechos reservados
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>.
                    Hecho por&nbsp;&nbsp;<a href="http://www.jp-agenciadigital.com/" target="_blank"><?= Html::img("@web/imgs/LOGOJPHORIZONTALnegro.png", ['height' => '18']) ?></a>
            </div>
        </div>
    </div>
</footer>