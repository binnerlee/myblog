<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
	public $layout = 'login';
	
	public function actionIndex()
	{
        if (!\Yii::$app->user->isGuest)
			return $this->goHome();
		
		$model = new \app\models\LoginForm();
		 if ($model->load(Yii::$app->request->post()) && $model->login()) {
			 if(array_key_exists('u',$_REQUEST) && !empty($_REQUEST['u']))
				$this->redirect(Yii::$app->urlManager->createUrl([$_REQUEST['u']]));
			else
				return $this->goBack();
		 }
		return $this->render('login', [
			'model' => $model,
		]);
	}
}
?>