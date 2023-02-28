<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Ad;

class AdsController extends Controller

    
{
    public function actionIndex()
    {
        $ads = Ad::find()->all();
        
        /*foreach($ads as $ad){

            print_r($ad);
            echo "KLASDJFLASDKJFÑALKSDJFÑL";
            echo $ad->id;//Aquí puedo coger las propiedades
        }*/
        
        return $this->render('index', [
            'ads' => $ads,
        ]);
    }

    public function actionRandomAd()
    {
        return Ad::find()->orderBy('RAND()')->one();
    }
}
