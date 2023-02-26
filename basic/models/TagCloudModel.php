<?php

namespace app\models;

use yii\db\ActiveRecord;

class TagCloudModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'etiquetas';
    }

    public static function getTagCloudData($id,$etiqueta)
    {
        return self::find()
            ->select([$id, $etiqueta, 'COUNT(*) AS count'])
            ->groupBy($etiqueta)
            ->asArray()
            ->all();
    }
}

?>
