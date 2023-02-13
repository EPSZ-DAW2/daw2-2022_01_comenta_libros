<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_comentarios".
 *
 * @property int $id
 * @property int $libro_id Libro relacionado.
 * @property int $valoracion Valoración dada al libro.
 * @property string $texto El texto del comentario.
 * @property int|null $comentario_id Comentario relacionado, si se permiten encadenar respuestas. Nodo padre de la jerarquia de comentarios, CERO si es nodo raiz.
 * @property int $cerrado Indicador de cierre de los comentarios: 0=No, 1=Si(No se puede responder al comentario)
 * @property int $num_denuncias Contador de denuncias del comentario o CERO si no ha tenido.
 * @property string|null $fecha_denuncia1 Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.
 * @property int $bloqueado Indicador de comentario bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...
 * @property string|null $fecha_bloqueo Fecha y Hora del bloqueo del comentario. Debería estar a NULL si no está bloqueado o si se desbloquea.
 * @property string|null $notas_bloqueo Notas visibles sobre el motivo del bloqueo del comentario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.
 * @property int|null $crea_usuario_id Usuario que ha creado el comentario o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $crea_fecha Fecha y Hora de creación del comentario o NULL si no se conoce por algún motivo.
 * @property int|null $modi_usuario_id Usuario que ha modificado el comentario por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $modi_fecha Fecha y Hora de la última modificación del comentario o NULL si no se conoce por algún motivo.
 */
class LibrosComentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros_comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id', 'texto'], 'required'],
            [['libro_id', 'valoracion', 'comentario_id', 'cerrado', 'num_denuncias', 'bloqueado', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['texto', 'notas_bloqueo'], 'string'],
            [['fecha_denuncia1', 'fecha_bloqueo', 'crea_fecha', 'modi_fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'libro_id' => 'Libro ID',
            'valoracion' => 'Valoracion',
            'texto' => 'Texto',
            'comentario_id' => 'Comentario ID',
            'cerrado' => 'Cerrado',
            'num_denuncias' => 'Num Denuncias',
            'fecha_denuncia1' => 'Fecha Denuncia1',
            'bloqueado' => 'Bloqueado',
            'fecha_bloqueo' => 'Fecha Bloqueo',
            'notas_bloqueo' => 'Notas Bloqueo',
            'crea_usuario_id' => 'Crea Usuario ID',
            'crea_fecha' => 'Crea Fecha',
            'modi_usuario_id' => 'Modi Usuario ID',
            'modi_fecha' => 'Modi Fecha',
        ];
    }
	
	
	public function getUsuario(){
		
		return $this->hasOne(Usuarios::class,['id'=>'crea_usuario_id'])->inverseOf('comentarios');
		
	}
}
