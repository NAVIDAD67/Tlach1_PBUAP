<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encargados".
 *
 * @property int $id_encargado
 * @property string $nombre
 * @property string $apellido
 * @property string $rol
 * @property string $fecha_alta
 * @property string $estado
 * @property string $foto
 */
class Encargado extends \yii\db\ActiveRecord
{

    public $archivo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encargados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'rol', 'fecha_alta', 'estado'], 'required'],
            [['nombre', 'apellido', 'rol'], 'string', 'max' => 255],
            [['fecha_alta'], 'string', 'max' => 9],
            [['estado'], 'string', 'max' => 8],

            [['foto'], 'string', 'max' => 500],

            [['archivo'], 'file', 'extensions' => 'jpg,png,jpeg'],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_encargado' => 'Id Encargado',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'rol' => 'Rol',
            'fecha_alta' => 'Fecha Alta',
            'estado' => 'Estado',
            'foto' => 'Foto',
            'archivo' =>'Imagen'
        ];
    }
}
