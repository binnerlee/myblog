<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Blog;

class BlogController extends Controller
{
	public $layout = 'front';
	public function actionIndex()
	{
		$query = new \yii\db\Query;
		$result = $query->select(['t0.gid','t0.title','t0.author','t0.sortid','t0.date','t0.excerpt','t0.attnum','t1.sortname'])->from('binner_blog t0')->leftJoin('binner_sort t1','t0.sortid = t1.sid');
	
		if(array_key_exists('t',$_GET) && isset($_GET['t']))
		{
			$result = $result->where(['t0.sortid' => $_GET['t']]);
		}
		
		$pagination = new Pagination([
			'defaultPageSize' => 10,
			'totalCount' => $result->count(),
		]);
		
		$arts = $result->orderBy('t0.date')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();
	
		return $this->render('index',[
			'arts' => $arts,
			'pagination' => $pagination,
		]);
	}
	
	public function actionDetail()
	{
		if(array_key_exists('id',$_GET) && isset($_GET['id']))
		{
			$id = Yii::$app->request->get('id');
			$query = new \yii\db\Query;
			$result = $query->select(['t0.gid','t0.title','t0.content','t0.author','t0.sortid','t0.attnum','t0.date','t1.sortname'])->from('binner_blog t0')->leftJoin('binner_sort t1','t0.sortid = t1.sid')->where(['t0.gid' => $id])->one();
			return $this->render('detail',[
			'art' => $result,
			]);
		}
		echo '³ö´í';
	}
}
?>