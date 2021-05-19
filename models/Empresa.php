<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $id_empresa
 * @property string $nombre
 * @property string $descripcion
 * @property string $giro
 * @property string $correo
 * @property string $telefono
 * @property string $fecha_alta
 * @property string $estado
 * @property string $logo_empresa
 */
class Empresa extends \yii\db\ActiveRecord
{

    public $archivo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'giro', 'correo', 'telefono', 'fecha_alta', 'estado'], 'required'],
            [['nombre', 'descripcion', 'giro', 'correo'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 20],
            [['fecha_alta', 'estado'], 'string', 'max' => 15],
            
            [['logo_empresa'], 'string', 'max' => 2500],

            /**CAMPO PARA GUARDAR LOS ARCHIVOS DE IMAGEN XD*/
            [['archivo'], 'file', 'extensions' => 'jpg,png'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'giro' => 'Giro',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'fecha_alta' => 'Fecha Alta',
            'estado' => 'Estado',
            'logo_empresa' => 'Logo Empresa',
            'archivo' =>'Imagen'
        ];
    }
}
