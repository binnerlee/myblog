<?php 
	namespace app\controllers;

	use yii\web\Controller;
	use app\lib\PasswordHash;
	use yii\helpers\Html;

	class TestController extends Controller
	{
		public function actionPwd($pwd = '123456')
		{
	        $ep = md5($pwd);
	        return $this->render('pwd',['pwd' => Html::encode($ep)]);
		}
	}
 ?>