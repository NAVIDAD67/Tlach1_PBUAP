<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participantes".
 *
 * @property int $id_participante
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property string $telefono
 * @property string $estado
 * @property string $fecha_alta
 * @property string $foto
 */
class Participante extends \yii\db\ActiveRecord
{

    public $archivo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participantes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'correo', 'telefono', 'estado', 'fecha_alta'], 'required'],
            [['nombre', 'apellido', 'correo'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 15],
            [['estado', 'fecha_alta'], 'string', 'max' => 20],


            [['foto'], 'string', 'max' => 2500],

            [['archivo'], 'file', 'extensions' => 'jpg,png,jpeg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_participante' => 'Id Participante',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'estado' => 'Estado',
            'fecha_alta' => 'Fecha Alta',
            'foto' => 'Foto',
            'archivo' =>'Imagen'
        ];
    }
}
