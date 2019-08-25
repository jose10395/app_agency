<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservas".
 *
 * @property int $id
 * @property string $nro
 * @property int $usuariofk
 * @property int $urbanizacion_area_socialfk
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $celular
 * @property string $created_at
 */
class Reservas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuariofk', 'urbanizacion_area_socialfk'], 'integer'],
            [['hora_inicio', 'hora_fin', 'created_at','fecha_reserva'], 'safe'],
            [['nro'], 'string', 'max' => 40],
            [['celular'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nro' => 'Nro',
            'usuariofk' => 'Usuariofk',
            'urbanizacion_area_socialfk' => 'Urbanizacion Area Socialfk',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'celular' => 'Celular',
            'created_at' => 'Created At',
        ];
    }
}
