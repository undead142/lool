<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TestForm;
use app\models\Message;

class TestController extends Controller{
	
	//public $layout = 'base';
	
	public function actionIndex(){
		//$param = null;
		//$param = TestForm::find()->asArray()->all();
		//$param = new TestForm();
		$param = TestForm::findOne(2);
		
		$param->name = 'test name';
		$param->save();
		
		
		return $this->render('index', compact('param'));
	}
	
	public function actionForm($id=null){
		$model = null;
		if($id>0){
			$model = TestForm::findOne($id);
			
		}else{
			$model = new TestForm();
		}
		if($model->load(Yii::$app->request->post())){
				if($model->validate()){
					$model->save();
					Yii::$app->session->setFlash('success',"Форма работает");
					//$model = new TestForm();
					
				}else{
					Yii::$app->session->setFlash('error',"Форма не работает");
				}
			}
			return $this->render('form', compact('model'));	
	}
	
}