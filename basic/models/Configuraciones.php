<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuraciones".
 *
 * @property string $variable
 * @property string|null $valor
 */
class Configuraciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configuraciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['variable'], 'required'],
            [['valor'], 'string'],
            [['variable'], 'string', 'max' => 50],
            [['variable'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'variable' => Yii::t('app', 'Variable'),
            'valor' => Yii::t('app', 'Valor'),
        ];
    }

    public static function getConfiguracion($variable){
        return Configuraciones::find()->where(['variable'=>$variable])->one()['valor'];
    }
}
