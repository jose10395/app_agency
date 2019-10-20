<?php

namespace app\components;

use yii\base\Component;
use DateTime;
use yii\db\Query;
use Yii;
use yii\helpers\Url;
use app\models\Opciones;

class MyComponent extends Component {


    public static function segToHoraDias($tiempo_en_segundos) {
        if ($tiempo_en_segundos != null) {
            $horas = floor($tiempo_en_segundos / 3600);
            $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
            $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
            $dias = round(($horas / 24), 0);
            $hora_texto = "";
            if ($dias > 0) {
                if ($dias > 1) {
                    $hora_texto .= $dias . " días";
                } else {
                    $hora_texto .= $dias . " día";
                }
            } else if ($horas > 0) {
                $hora_texto .= $horas . " h";
            } else if ($minutos > 0) {
                $hora_texto .= $minutos . " min";
            } else if ($segundos > 0) {
                $hora_texto .= $segundos . " seg";
            }

            if ($horas == 0 && $minutos == 0 && $segundos == 0) {
                $hora_texto .= " - ";
            }

            return $hora_texto;
        } else {
            return " 1 seg ";
        }
    }

    public static function itemsMenu() {
        $notificaciones = \app\models\Notificaciones::find()
                ->select('notificaciones.fecha as fecha,perfiluser.foto as foto,notificaciones.id as id,notificaciones.titulo as titulo,notificaciones.descripcionbreve as descripcionbreve,notificaciones.url as url')
                ->innerJoin('accion_notificacion_usuario', 'accion_notificacion_usuario.id=notificaciones.userfk')
                ->innerJoin('user', 'user.id=accion_notificacion_usuario.userfk')
                ->innerJoin('perfiluser', 'perfiluser.userfk=user.id')
                ->where(['accion_notificacion_usuario.userfk' => Yii::$app->user->identity->id])
                ->andWhere(['estado' => 0])
                ->orderBy('notificaciones.id desc')
                ->asArray()
                ->all();
        $html = '';
        $base = Url::base(true);
        foreach ($notificaciones as $value) {
            $fechaNotificacion = strtotime($value['fecha']);
            $fechaActual = strtotime(date('Y-m-d H:i:s'));
            $fechaaa = $fechaActual - $fechaNotificacion;
            $foto = ($value['foto']) ? $base . '/' . $value['foto'] : $base . '/images/user.jpg';

            $html .= '<li class="notificacion_leida" onclick="leida_notify(' . $value['id'] . ')">
            <a href="' . $value['url'] . '">
              <div class="pull-left">
                <img src="' . $foto . '" class="img-circle" alt="User Image">
              </div>              
              <h4>
                ' . $value['titulo'] . '
                <small><i class="fa fa-clock-o"></i> ' . MyComponent::segToHoraDias($fechaaa) . '</small>
              </h4>
              <p>' . $value['descripcionbreve'] . '</p>
            </a>
          </li>';
        }
        return $html;
    }

    public static function covertNumberToTime($number) {
        $value = (float) $number;
        if ($value == 0) {
            $value = '';
        } else {
            $entera = (int) $value;
            $decimal = strpos($value, '.') ? explode('.', $value)[1] : 0;
            $value = str_pad($entera, 2, '0', STR_PAD_LEFT) . ':' . str_pad(round($decimal * (60 / (str_pad(1, strlen($decimal) + 1, 0)))), 2, '0', STR_PAD_LEFT);
        }
        return $value;
    }

    public static function tofloat($num) {
        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
                ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

        if (!$sep) {
            return floatval(preg_replace("/[^0-9]/", "", $num));
        }

        return floatval(
                preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
                preg_replace("/[^0-9]/", "", substr($num, $sep + 1, strlen($num)))
        );
    }

}
