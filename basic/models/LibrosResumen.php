<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property int $id
 * @property string $titulo Titulo corto o slogan para el libro.
 * @property string|null $resumen Descripción breve del libro o NULL si no es necesaria.
 * @property int|null $autor_id Autor principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).
 * @property int|null $ilustrador_id Ilustrador principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).
 * @property int|null $traductor_id Traductor principal del libro o CERO si no existe o aún no está indicada (como si fuera NULL).
 * @property int|null $editorial_id Editorial del libro o CERO si no existe o aún no está indicada (como si fuera NULL).
 * @property int|null $genero_id Género/Categoria de clasificación del libro o CERO si no existe o aún no está indicada (como si fuera NULL).
 * @property string|null $coleccion Descripcion de la colección a la que pertenece el libro o NULL si no se conoce.
 * @property int|null $idioma_id Idioma de edición del libro o CERO si no existe o aún no está indicado (como si fuera NULL).
 * @property string $clase_formato_id Código de clase de formato: P=Papel, B=Papel/Bolsillo, D=Digital, E=Digital/EBook, A=Digital/Audible, ...
 * @property int $paginas Número de páginas del libro o CERO si no se conoce aún.
 * @property string|null $imagen_id Nombre identificativo (fichero interno) con la imagen principal o "de portada" del libro, o NULL si no hay.
 * @property int $visible Indicador de libro visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.
 * @property int $terminado Indicador de libro terminado o suspendido: 0=No, 1=Eliminado por usuario, 2=Suspendido, 3=Cancelado por inadecuado, ...
 * @property string|null $fecha_terminacion Fecha y Hora de terminación del libro. Debería estar a NULL si no está terminado.
 * @property int $num_denuncias Contador de denuncias del libro o CERO si no ha tenido.
 * @property string|null $fecha_denuncia1 Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.
 * @property int $bloqueado Indicador de libro bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...
 * @property string|null $fecha_bloqueo Fecha y Hora del bloqueo del libro. Debería estar a NULL si no está bloqueado o si se desbloquea.
 * @property string|null $notas_bloqueo Notas visibles sobre el motivo del bloqueo del libro o NULL si no hay -se muestra por defecto según indique "bloqueado"-.
 * @property int $cerrado_comentar Indicador de libro cerrado para comentarios: 0=No, 1=Si.
 * @property int $sumaValores Suma acumulada de las valoraciones para el libro.
 * @property int $totalVotos Contador de votos (valoraciones) emitidas para el libro.
 * @property int $cerrado_eventos Indicador de libro cerrado para eventos: 0=No, 1=Si.
 * @property int|null $crea_usuario_id Usuario que ha creado el libro o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $crea_fecha Fecha y Hora de creación del libro o NULL si no se conoce por algún motivo.
 * @property int|null $modi_usuario_id Usuario que ha modificado el libro por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $modi_fecha Fecha y Hora de la última modificación del libro o NULL si no se conoce por algún motivo.
 * @property string|null $notas_admin Notas adicionales para los moderadores/administradores sobre el libro o NULL si no hay.
 */
class LibrosResumen extends \yii\db\ActiveRecord
{	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo', 'resumen', 'coleccion', 'notas_bloqueo', 'notas_admin'], 'string'],
            [['autor_id', 'ilustrador_id', 'traductor_id', 'editorial_id', 'genero_id', 'idioma_id', 'paginas', 'visible', 'terminado', 'num_denuncias', 'bloqueado', 'cerrado_comentar', 'sumaValores', 'totalVotos', 'cerrado_eventos', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['fecha_terminacion', 'fecha_denuncia1', 'fecha_bloqueo', 'crea_fecha', 'modi_fecha'], 'safe'],
            [['clase_formato_id'], 'string', 'max' => 1],
            [['imagen_id'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'resumen' => Yii::t('app', 'Resumen'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'editorial_id' => Yii::t('app', 'Editorial ID'),
            'genero_id' => Yii::t('app', 'Genero ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LibrosResumenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosResumenQuery(get_called_class());
    }
	
	public function getEditorialname(){
        return $this->hasOne(Editorial::class, ['id' => 'editorial_id']);
    }// getEditoriales
	
	public function getEditorial(){
		return $this->editorialname->nombre;
	}
	
	public function getAutorname(){
        return $this->hasOne(Autores::class, ['id' => 'autor_id']);
    }// getAutores
	
	public function getAutor(){
		return $this->autorname->nombre;
	}
	
	public function getGeneroname(){
        return $this->hasOne(Generos::class, ['id' => 'genero_id']);
    }// getGenero
	
	public function getGenero(){
		return $this->generoname->nombre;
	}
}
