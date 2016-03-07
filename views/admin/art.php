<?php
	//按需加载css和js文件  https://segmentfault.com/a/1190000003742452
	use app\assets\AppAsset;
	use yii\helpers\Html;
	AppAsset::register($this);
	AppAsset::addScriptForHead($this,'@web/editor/kindeditor.js?v=1.0');
	AppAsset::addScriptForHead($this,'@web/editor/lang/zh_CN.js?v=1.0');
	
	$gid = '';
	$title = '';
	$content = '';
	if(isset($art))
	{
		$gid = $art->gid;
		$title = $art->title;
		$content = $art->content;
	}
?>

<h2 class="sub-header">写文章</h2>
<div class="row placeholders">
	<form action="<?= Yii::$app->urlManager->createUrl(['admin/art']) ?>" method="post">
		<input type="hidden" id="txtId" name="txtId" value="<?=Html::encode($gid)?>" />
	<div class="col-xs-12 col-sm-12 placeholder">
	  <input type="text" class="form-control" name="txtTitle" id="txtTitle" placeholder="请输入文章标题" value="<?=Html::encode($title)?>"/>
	</div>
	<div class="col-xs-12 col-sm-12 placeholder">
		<textarea id="txtContent" name="txtContent" class="form-control" style="height:250px;"><?=$content?></textarea>
	</div>
	<div class="col-xs-12 col-sm-12 placeholder">
		<select class="form-control" id="ddlType">
			<option value="">选择分类...</option>
			<?php foreach($types as $t): ?>
			<option value="<?=$t->sid ?>>"><?=$t->sortname?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="col-xs-12 col-sm-12 placeholder">
		<button type="submit" class="btn btn-info">发布文章</button>
		<button type="button" class="btn btn-info">保存草稿</button>
	</div>
	</form>
</div>

<?php $this->beginBlock('test') ?>
loadEditor('txtContent');
setTimeout("autosave(0)",60000);
<?php $this->endBlock(); ?>
<?php
	$this->registerJs($this->blocks['test'],yii\web\View::POS_END);
?>