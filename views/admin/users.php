<h2 class="sub-header">类型管理</h2>
<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>名称</th>
		  <th>用户类型</th>
		  <th>电子邮件</th>
		  <th>添加时间</th>
		  <th>操作</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
		  <td>admin</td>
		  <td>管理员</td>
		  <td>liguo9860@126.com</td>
		  <td>2014-01-01 00:00:00</td>
		  <td>
			<ul class="list-inline">
				<li>
					<a href="#">编辑</a>
				</li>
				<li>
					<a href="#" onclick="javascript:return confirm('确认删除？');">删除</a>
				</li>
				<li>
					<a href="pwd.html">修改密码</a>
				</li>
			</ul>
		  </td>
		</tr>
	  </tbody>
	</table>
</div>
<div class="container-fluid">
	<a href="javascript:;" id="formToggle">添加用户+</a>
	<div id="formDiv" style="display:none;">
		<form action="#" method="post">
			<div class="form-group">
				<select class="form-control">
				  <option value="">请选择用户类型...</option>
				  <option value="0">管理员</option>
				</select>
			</div>
			<div class="form-group">
				<input id="txtName" type="text" class="form-control" placeholder="请输入用户名称" required autofocus/>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="txtEmail1" placeholder="请输入邮箱地址">
			</div>
			<button type="submit" class="btn btn-default">确认</button>
		</form>
	</div>
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