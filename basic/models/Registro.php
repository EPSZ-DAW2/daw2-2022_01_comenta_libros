<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registros".
 *
 * @property int $id
 * @property string $fecha_registro Fecha y Hora del registro.
 * @property string $clase_log_id código de clase de log: E=Error, A=Aviso, S=Seguimiento, I=Información, D=Depuración, ...
 * @property string|null $modulo Modulo o Sección de la aplicación que ha generado el mensaje de registro.
 * @property string|null $texto Texto con el mensaje de registro.
 * @property string|null $ip Dirección IP desde donde accede el usuario (vale para IPv4 e IPv6.
 * @property string|null $browser Texto con información del navegador utilizado en el acceso.
 */
class Registro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_registro', 'clase_log_id'], 'required'],
            [['fecha_registro'], 'safe'],
            [['texto', 'browser'], 'string'],
            [['clase_log_id'], 'string', 'max' => 1],
            [['modulo'], 'string', 'max' => 50],
            [['ip'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
            'clase_log_id' => Yii::t('app', 'Clase Log ID'),
            'modulo' => Yii::t('app', 'Modulo'),
            'texto' => Yii::t('app', 'Texto'),
            'ip' => Yii::t('app', 'Ip'),
            'browser' => Yii::t('app', 'Browser'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return RegistrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegistrosQuery(get_called_class());
    }
}
