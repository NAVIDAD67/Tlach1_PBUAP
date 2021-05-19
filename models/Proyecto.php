<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property int $id_proyecto
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_alta
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property int $estado
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyecto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'fecha_alta', 'fecha_inicio', 'fecha_final', 'estado'], 'required'],
            [['estado'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
            [['fecha_alta', 'fecha_inicio', 'fecha_final'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proyecto' => 'Id Proyecto',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'fecha_alta' => 'Fecha Alta',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_final' => 'Fecha Final',
            'estado' => 'Estado',
        ];
    }
}
