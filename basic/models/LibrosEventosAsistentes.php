<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_eventos_asistentes".
 *
 * @property int $id
 * @property int $libro_id Libro relacionado. Copia de la que tiene el evento por agilidad en búsquedas.
 * @property int $evento_id Evento relacionado.
 * @property int|null $usuario_id usuario relacionado que asistira al evento.
 * @property string|null $fecha_alta Fecha y Hora de creación de la asistencia al evento o NULL si no se conoce por algún motivo.
 */
class LibrosEventosAsistentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros_eventos_asistentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id', 'evento_id'], 'required'],
            [['libro_id', 'evento_id', 'usuario_id'], 'integer'],
            [['fecha_alta'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'libro_id' => Yii::t('app', 'Libro ID'),
            'evento_id' => Yii::t('app', 'Evento ID'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'fecha_alta' => Yii::t('app', 'Fecha Alta'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LibrosEventosAsistentesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosEventosAsistentesQuery(get_called_class());
    }
}
