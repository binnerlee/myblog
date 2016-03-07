<?php
	$id='';
	$name='';
	$desc='';
	
	if(isset($type))
	{
		$id = $type->sid;
		$name = $type->sortname;
		$desc = $type->description;
	}
?>
<h2 class="sub-header">编辑类型</h2>
<div class="container-fluid">
	<div id="formDiv">
		<form action="<?= Yii::$app->urlManager->createUrl(['admin/edit-type']) ?>" method="post">
			<input type="hidden" id="txtId" name="txtId" value="<?=$id ?>"/>
			<div class="form-group">
				<label for="txtName">名称：</label>
				<input id="txtName" name="txtName" type="text" class="form-control" placeholder="请输入类型名称" required autofocus value="<?=$name?>"/>
			</div>
			<div class="form-group">
				<label for="txtDesc">描述：</label>
				<textarea id="txtDesc" name="txtDesc" class="form-control" style="height:100px;"><?=$desc?></textarea>
			</div>
			<button type="submit" class="btn btn-default">确认</button>
		</form>
	</div>
</div>