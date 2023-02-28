<?php

namespace app\controllers;

use app\models\Cuenta_opciones;
use yii\web\Controller;

class CuentaController extends Controller
{
    public function actionIndex()
    {
        $options = [
            new Cuenta_opciones('Cambiar Contraseña'),
            new Cuenta_opciones('Cambiar nickname'),
            new Cuenta_opciones('Editar Direcciones'),
            
        ];
        
        return $this->render('index', ['options' => $options]);
    }
}

?>