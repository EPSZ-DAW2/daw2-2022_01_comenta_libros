<?php
namespace app\models;

use yii\db\ActiveRecord;

class UsuarioEtiquetas extends ActiveRecord
{
    public static function tableName()
    {
        return 'usuarios_etiquetas';
    }

    public function rules()
    {
        return [
            [['usuario_id'], 'required'],
            [['genero_id'], 'required'],
        ];
    }
}

?>