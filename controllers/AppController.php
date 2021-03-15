<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class AppController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function beforeAction($action){
		
		
		$this->layout = "my_layout";
		return parent::beforeAction($action);
	}
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update','delete'],
                'rules' => [
                    [
                        'actions' => ['create','update','delete'],
                        'allow' => true,
                        //'roles' => ['@'],
						'matchCallback' => function ($rule, $action) {
                           // return date('d-m') === '31-10';
						 //  var_dump(Yii::$app->user->identity);
						 if(!Yii::$app->user->isGuest){
						   return in_array(Yii::$app->user->identity->user_name ,['admin','demo']);
						 }else{
							 return false;
						 }
                        }
						
                    ],
                ],
            ],
           
        ];
    }

  
 
}
