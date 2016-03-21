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
		
		public function actionIns()
		{
			$tag = new \app\models\Tag;
			$tag->gid=',1,';
			$tag->tagname = 'test';
			$tag->save();
			print_r($tag);
		}
		
		public function actionLike()
		{
			$result = \app\models\Tag::find()->where(['like','gid','2'])->all();
			print_r($result);
		}
		
		public function actionTags()
		{
			$query = new \yii\db\Query;
            $tagList = $query->select(['tagname'])->from('binner_tag')->where(['like','gid',",20,"])->all();
			$currentTags = array();
			foreach($tagList as $t)
				$currentTags[] = $t['tagname'];
			print_r(implode(',',$currentTags));
		}
		
		public function actionReg()
		{
			$tagStr = '论文,测试,标签，123';
			$tags = !empty($tagStr) ? preg_split('/[,\s]|(，)/',$tagStr) : array();
			$tag  = array_filter(array_unique($tags));
			print_r($tag);
		}
	}
 ?>