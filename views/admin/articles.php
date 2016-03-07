<?php
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
?>
<h2 class="sub-header">文章列表</h2>
<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th><input type="checkbox" id="cbAll"/></th>
		  <th>标题</th>
		  <th>查看</th>
		  <th>作者</th>
		  <th>分类</th>
		  <th>时间</th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach($arts as $art): ?>
		<tr>
		  <td><input type="checkbox" id="cbItem<?=$art['gid']?>" /></td>
		  <td><a href="<?=Yii::$app->urlManager->createUrl(['admin/art/'.$art['gid']]) ?>"><?= Html::encode($art['title']) ?></a></td>
		  <td><a href="<?=Yii::$app->urlManager->createUrl(['admin/art/'.$art['gid']]) ?>">查看</a></td>
		  <td><a href="#">admin</a></td>
		  <td><?=$art['sortname']?></td>
		  <td><?= date("Y-m-d h:i:s",$art['date']) ?></td>
		</tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
	<?= LinkPager::widget(['pagination' => $pagination])?>
	<div class="container-fluid">
	<ul class="list-inline">
	  <li>
		选中项：<input id="" type="button" class="btn btn-info" value="删除"/>
	  </li>
	  <li>
	  |
	  </li>
	  <li>
		<select id="ddlType" class="form-control">
			<option value="">移动到分类...</option>
			<?php foreach($types as $t): ?>
			<option value="<?=$t->sid ?>"><?=$t->sortname?></option>
			<?php endforeach; ?>
		</select>
	  </li>
	</ul>
	</div>
</div>

<?php $this->beginBlock('test') ?>
$(document).ready(function(){
	$('#cbAll').click(function(){
		$('input[type=checkbox][id^=cbItem]').prop('checked',this.checked);
	});
	
	$('#ddlType').change(function(){
		var typeid = $("#ddlType option:selected").val();
		if(!typeid){
			alert('请选择类型！');
			return;
		}
		var ids = '';
		var split = '';
		$('input[type=checkbox][id^=cbItem]:checked').each(function(){
			ids += split + this.id.substr(6);
			split = ',';
		});
		
		if(!ids)
		{
			alert('未选择文章！');
			$(this).val('');
			return;
		}
		
		var params = new Array();
		params['ids'] = ids;
		params['typeid'] = typeid;
		var datas = '';
		for (var key in params) {
			var data = params[key];
			if (!data) {
				data = "";
			}
			if (datas == "") {
				datas = key + "=" + data;
			} else {
				datas += "&" + key + "=" + data;
			}
		}
		
		$.ajax({
			type: 'POST',
			url:'<?=Yii::$app->urlManager->createUrl(['admin/art-type'])?>',
			data: encodeURI(datas),
			dataType: 'json',
			success: function(data) {
				if(data === "OK")
					location.reload();
				else
				{
					var result = data.split('|');
					alert(result[1]);
				}
			},
			error: function(e) {
				if(e.responseText === "OK")
					location.reload();
			}
		});
	});
});
<?php $this->endBlock() ?>
<?php
	$this->registerJs($this->blocks['test'],\yii\web\View::POS_END);
?>