<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_eventos".
 *
 * @property int $id
 * @property int $libro_id Libro relacionado.
 * @property string $texto El texto del evento.
 * @property string|null $fecha_desde Fecha y Hora de inicio del evento o NULL si no se conoce (mostrar próximamente).
 * @property string|null $fecha_hasta Fecha y Hora de finalización del evento o NULL si no se conoce (no caduca automáticamente).
 * @property int $num_denuncias Contador de denuncias del evento o CERO si no ha tenido.
 * @property string|null $fecha_denuncia1 Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.
 * @property int $bloqueado Indicador de evento bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...
 * @property string|null $fecha_bloqueo Fecha y Hora del bloqueo del evento. Debería estar a NULL si no está bloqueada o si se desbloquea.
 * @property string|null $notas_bloqueo Notas visibles sobre el motivo del bloqueo del evento o NULL si no hay -se muestra por defecto según indique "bloqueado"-.
 * @property int|null $crea_usuario_id Usuario que ha creado el evento o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $crea_fecha Fecha y Hora de creación del evento o NULL si no se conoce por algún motivo.
 * @property int|null $modi_usuario_id Usuario que ha modificado el evento por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $modi_fecha Fecha y Hora de la última modificación del evento o NULL si no se conoce por algún motivo.
 */
class LibrosEventos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros_eventos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id', 'texto'], 'required'],
            [['libro_id', 'num_denuncias', 'bloqueado', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['texto', 'notas_bloqueo'], 'string'],
            [['fecha_desde', 'fecha_hasta', 'fecha_denuncia1', 'fecha_bloqueo', 'crea_fecha', 'modi_fecha'], 'safe'],
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
            'texto' => Yii::t('app', 'Texto'),
            'fecha_desde' => Yii::t('app', 'Fecha Desde'),
            'fecha_hasta' => Yii::t('app', 'Fecha Hasta'),
            'num_denuncias' => Yii::t('app', 'Num Denuncias'),
            'fecha_denuncia1' => Yii::t('app', 'Fecha Denuncia1'),
            'bloqueado' => Yii::t('app', 'Bloqueado'),
            'fecha_bloqueo' => Yii::t('app', 'Fecha Bloqueo'),
            'notas_bloqueo' => Yii::t('app', 'Notas Bloqueo'),
            'crea_usuario_id' => Yii::t('app', 'Crea Usuario ID'),
            'crea_fecha' => Yii::t('app', 'Crea Fecha'),
            'modi_usuario_id' => Yii::t('app', 'Modi Usuario ID'),
            'modi_fecha' => Yii::t('app', 'Modi Fecha'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LibrosEventosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosEventosQuery(get_called_class());
    }
	
	public function getLibros(){

        return $this->hasOne(Libros::class, ['id' => 'libro_id']);
        
    }// getEditoriales
	
	public function getUsuarios(){

        return $this->hasOne(Usuarios::class, ['id' => 'crea_usuario_id']);
        
    }// getEditoriales
}
