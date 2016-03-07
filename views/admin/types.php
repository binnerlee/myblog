<?php 
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
?>
<h2 class="sub-header">类型管理</h2>
<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>名称</th>
		  <th>描述</th>
		  <th>操作</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php foreach($types as $t): ?>
		<tr>
		  <td><?= Html::encode($t->sortname) ?></td>
		  <td><?= Html::encode($t->description) ?></td>
		  <td>
			<ul class="list-inline">
				<li>
					<a href="<?= Yii::$app->urlManager->createUrl(['admin/edit-type/'.$t->sid]) ?>">编辑</a>
				</li>
				<li>
					<a href="#" onclick="javascript:return confirm('确认删除？');">删除</a>
				</li>
			</ul>
		  </td>
		</tr>
	  <?php endforeach; ?>
	  </tbody>
	</table>
</div>
<div class="container-fluid">
	<a href="javascript:;" id="formToggle">添加分类+</a>
	<div id="formDiv" style="display:none;">
		<form action="<?= Yii::$app->urlManager->createUrl(['admin/types']) ?>" method="post">
			<div class="form-group">
				<label for="txtName">名称：</label>
				<input id="txtName" name="txtName" type="text" class="form-control" placeholder="请输入类型名称" required autofocus/>
			</div>
			<div class="form-group">
				<label for="txtDesc">描述：</label>
				<textarea id="txtDesc" name="txtDesc" class="form-control" style="height:100px;"></textarea>
			</div>
			<button type="submit" class="btn btn-default">确认</button>
		</form>
	</div>
	<?=LinkPager::widget(['pagination'=>$pagination])  ?>
</div>
<?php 
	$this->beginBlock('test')
?>
$(document).ready(function(){
	$('#formToggle').click(function(){
		if($('#formDiv').css('display') === 'block')
			$('#formDiv').hide();
		else
			$('#formDiv').show();
	});
});
<?php 
	$this->endBlock()
?>
<?php 
	$this->registerJs($this->blocks['test'],\yii\web\View::POS_END);
?>