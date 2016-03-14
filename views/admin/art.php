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
	$excerpt = '';
	$sortid = '';
	if(isset($art))
	{
		$gid = $art->gid;
		$title = $art->title;
		$content = $art->content;
		$excerpt = $art->excerpt;
		$sortid = $art->sortid;
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
		<label for="txtExcerpt" style="float:left;">摘要：</label>
		<textarea id="txtExcerpt" name="txtExcerpt" class="form-control" style="height:100px;"><?=$excerpt?></textarea>
	</div>
	<div class="col-xs-12 col-sm-12 placeholder">
		<select class="form-control" id="ddlType" name="ddlType">
			<option value="-1">选择分类...</option>
			<?php foreach($types as $t): ?>
			<option value="<?=$t->sid ?>"<?=$t->sid == $sortid ? 'selected' : '' ?>><?=$t->sortname?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<!--
	<div class="col-xs-10 col-sm-10 placeholder">
		<input type="text" id="txtTags" name="txtTags" class="form-control" placeholder="文章标签，逗号或空格分隔，过多的标签会影响系统运行效率"/>
	</div>
	<div class="col-xs-2 col-sm-2 placeholder">
		<a href="javascript:;">已有标签+</a>
	</div>
	-->
	<div class="col-xs-12 col-sm-12 placeholder">
		<button type="submit" class="btn btn-info">发布文章</button>
		<button type="button" class="btn btn-info">保存草稿</button>
	</div>
	</form>
</div>

<?php $this->beginBlock('test') ?>
loadEditor('txtContent');
loadEditor('txtExcerpt');
setTimeout("autosave(0)",60000);
<?php $this->endBlock(); ?>
<?php
	$this->registerJs($this->blocks['test'],yii\web\View::POS_END);
?>