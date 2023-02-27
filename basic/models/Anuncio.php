<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anuncios".
 *
 * @property int $id
 * @property int $patrocinador_id Patrocinador relacionado con el anuncio.
 * @property string $titulo Titulo corto o slogan para el anuncio.
 * @property string|null $descripcion Descripción o texto del anuncio.
 * @property int $prioridad Indicador de importancia para dar más o menos visibilidad al anuncio.
 * @property int $visible Indicador de anuncio visible a los usuarios o invisible (se está manteniendo o no publicado): 0=Invisible, 1=Visible.
 * @property int|null $editorial_id Relación con una Editorial o NULL si no tiene nada que ver.
 * @property int|null $libro_id Relación con un Libro o NULL si no tiene nada que ver.
 * @property int|null $genero_id Relación con un Género o NULL si no tiene nada que ver.
 * @property int|null $evento_id Relación con un Evento o NULL si no tiene nada que ver.
 * @property int|null $crea_usuario_id Usuario que ha creado el registro o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $crea_fecha Fecha y Hora de creación del registro o NULL si no se conoce por algún motivo.
 * @property int|null $modi_usuario_id Usuario que ha modificado el registro por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.
 * @property string|null $modi_fecha Fecha y Hora de la última modificación del registro o NULL si no se conoce por algún motivo.
 */
class Anuncio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anuncios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patrocinador_id', 'titulo'], 'required'],
            [['patrocinador_id', 'prioridad', 'visible', 'editorial_id', 'libro_id', 'genero_id', 'evento_id', 'crea_usuario_id', 'modi_usuario_id'], 'integer'],
            [['titulo', 'descripcion'], 'string'],
            [['crea_fecha', 'modi_fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'patrocinador_id' => Yii::t('app', 'Patrocinador ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'prioridad' => Yii::t('app', 'Prioridad'),
            'visible' => Yii::t('app', 'Visible'),
            'editorial_id' => Yii::t('app', 'Editorial ID'),
            'libro_id' => Yii::t('app', 'Libro ID'),
            'genero_id' => Yii::t('app', 'Genero ID'),
            'evento_id' => Yii::t('app', 'Evento ID'),
            'crea_usuario_id' => Yii::t('app', 'Crea Usuario ID'),
            'crea_fecha' => Yii::t('app', 'Crea Fecha'),
            'modi_usuario_id' => Yii::t('app', 'Modi Usuario ID'),
            'modi_fecha' => Yii::t('app', 'Modi Fecha'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AnunciosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnunciosQuery(get_called_class());
    }
}
