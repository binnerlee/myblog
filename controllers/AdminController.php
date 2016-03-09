<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Blog;

class AdminController extends Controller
{
	public $layout = 'blog';
	public $enableCsrfValidation=false;
	public function beforeAction($action)
	{
		if(Yii::$app->user->isGuest)
		{
			$this->redirect(Yii::$app->urlManager->createUrl(['site/login']));
		}
		
		return parent::beforeAction($action);
	}
	
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	public function actionArticles()
	{
		//$query = \app\models\Blog::find();
		
		$query = new \yii\db\Query;
		
		$result = $query->select(['t0.gid','t0.title','t0.author','t0.sortid','t0.date','t1.sortname'])->from('binner_blog t0')->leftJoin('binner_sort t1','t0.sortid = t1.sid');
		
		
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount' => $result->count(),
		]);
		
		$arts = $result->orderBy('t0.date')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
	
		$types = \app\models\Sort::find()->all();
	
		return $this->render('articles',[
			'arts' => $arts,
			'pagination' => $pagination,
			'types' => $types,
		]);
	}
	
	public function actionArt()
	{
		if(Yii::$app->request->get('id'))
		{
			$types = \app\models\Sort::find()->all();
			
			$id = Yii::$app->request->get('id');
			$art = Blog::findOne(['gid' =>$id]);
			return $this->render('art',[
			'art' => $art,
			'types' => $types,
			]);
		}
		else if(isset($_REQUEST) && count($_REQUEST) > 0)
		{
			if($_REQUEST['txtId'])
			{
				$newart = Blog::findOne(['gid'=>$_REQUEST['txtId']]);
			}
			else
			{
				$newart = new \app\models\Blog;
				$newart->alias = '';
				$newart->author = 0;
				$newart->sortid= $_REQUEST['ddlType'];
				$newart->type='blog';
				$newart->views='0';
				$newart->comnum='0';
				$newart->attnum='0';
				$newart->top='n';
				$newart->sortop='n';
				$newart->hide='n';
				$newart->checked='y';
				$newart->allow_remark='y';
				$newart->password='';
				$newart->template='';
			}
			
			$newart->title = addslashes(trim($_REQUEST['txtTitle']));
			$newart->date = time();
			$newart->content = addslashes(trim($_REQUEST['txtContent']));
			$newart->excerpt = addslashes(trim($_REQUEST['txtExcerpt']));
			
			if($_REQUEST['txtId'])
				$newart->update();
			else
				$newart->save();
			return $this->redirect(Yii::$app->urlManager->createUrl(['admin/articles']));
		}
	
		$types = \app\models\Sort::find()->all();
		
		return $this->render('art',['types' => $types,]);
	}
	
	public function actionArtType()
	{
		if(!array_key_exists('ids',$_POST) || !$_POST['ids'])
		{
			echo 'Fail|未选择文章';
			return;
		}
		if(!array_key_exists('typeid',$_POST) || !$_POST['typeid'])
		{
			echo 'Fail|未选择类型';
			return;
		}
		
		$id = explode(',',$_POST['ids']);
		\app\models\Blog::updateAll(['sortid' => $_POST['typeid']],['gid' => $id]);
		
		echo 'OK';
	}
	
	public function actionModifyPwd()
	{
		if(Yii::$app->request->get('id'))
		{
			$id = Yii::$app->request->get('id');
			$user = \app\models\User::findOne(['uid' =>$id]);
			return $this->render('modifypwd',['user' => $user]);
		}
		else if(isset($_REQUEST) && count($_REQUEST) > 0)
		{
			if($_REQUEST['txtId'])
			{
				$user = \app\models\User::findOne(['uid' => $_REQUEST['txtId']]);
			}
			else
			{
				$user = new \app\models\User();
			}
			$user->password = md5($_REQUEST['txtPwd']);
			
			if($_REQUEST['txtId'])
				$user->update();
			else
				$user->save();
				
			return $this->redirect(Yii::$app->urlManager->createUrl(['admin/modify-pwd/'.$user->uid]));
		}
		return $this->render('users');
	}
	
	public function actionTypes()
	{
		if(array_key_exists('txtName',$_REQUEST))
		{
			$sort = new \app\models\Sort();
			$sort->sortname = $_REQUEST['txtName'];
			$sort->description = $_REQUEST['txtDesc'];
			$sort->save();
			
			return $this->redirect(Yii::$app->urlManager->createUrl(['admin/types']));
		}
		
		$query = \app\models\Sort::find();
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount' => $query->count(),
		]);
		
		$types = $query->offset($pagination->offset)
					->limit($pagination->limit)
					->all();
		
		return $this->render('types',[
			'types' => $types,
			'pagination' => $pagination,
		]);
	}
	
	public function actionEditType()
	{
		if(Yii::$app->request->get('id'))
		{
			$id = Yii::$app->request->get('id');
			$type = \app\models\Sort::findOne(['sid' =>$id]);
			return $this->render('type',['type' => $type]);
		}
		else if(isset($_REQUEST) && count($_REQUEST) > 0)
		{
			if($_REQUEST['txtId'])
			{
				$sort = \app\models\Sort::findOne(['sid' => $_REQUEST['txtId']]);
			}
			else
			{
				$sort = new \app\models\Sort();
			}
			$sort->sortname = $_REQUEST['txtName'];
			$sort->description = $_REQUEST['txtDesc'];
			
			if($_REQUEST['txtId'])
				$sort->update();
			else
				$sort->save();
		}
		return $this->redirect(Yii::$app->urlManager->createUrl(['admin/types']));
	}
	
	public function actionUsers()
	{
		if(array_key_exists('txtName',$_REQUEST))
		{
			if($_REQUEST['txtPwd'] && $_REQUEST['txtPwd'] === $_REQUEST['txtRePwd'])
			{
				$user = new \app\models\User();
				$user->username = $_REQUEST['txtName'];
				$user->password = md5($_REQUEST['txtPwd']);				
				$user->save();
			}
			return $this->redirect(Yii::$app->urlManager->createUrl(['admin/users']));
		}
		
		$query = \app\models\User::find();
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount' => $query->count(),
		]);
		
		$types = $query->offset($pagination->offset)
					->limit($pagination->limit)
					->all();
		
		return $this->render('users',[
			'users' => $types,
			'pagination' => $pagination,
		]);
	}
}
?>