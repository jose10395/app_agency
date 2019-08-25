<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<footer class="footer" style="background-color: white;  position: fixed;  bottom: 0;  width: 100%;  height: 6%; color: #767575;z-index:2">
    <div class="container-fluid">
        <div class="copyright" style="text-align:center;margin-top:-18px;font-weight:bold;">
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