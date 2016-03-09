<?php
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
?>

<h2 class="sub-header">用户管理</h2>
<div class="table-responsive">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>名称</th>
		  <th>用户类型</th>
		  <th>电子邮件</th>
		  <th>操作</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php foreach($users as $u): ?>
		<tr>
		  <td><?= Html::encode($u->username) ?></td>
		  <td>管理员</td>
		  <td><?= Html::encode($u->email) ?></td>
		  <td>
			<ul class="list-inline">
				<li>
					<a href="javascript:;">编辑</a>
				</li>
				<li>
					<a href="javascript:;" onclick="javascript:return confirm('确认删除？');">删除</a>
				</li>
				<li>
					<a href="<?= Yii::$app->urlManager->createUrl(['admin/modify-pwd/'.$u->uid]) ?>">修改密码</a>
				</li>
			</ul>
		  </td>
		</tr>
		<?php endforeach;?>
	  </tbody>
	</table>
</div>
<div class="container-fluid">
	<a href="javascript:;" id="formToggle">添加用户+</a>
	<div id="formDiv" style="display:none;">
		<form action="<?= Yii::$app->urlManager->createUrl(['admin/users']) ?>" method="post">
			<div class="form-group">
				<select class="form-control">
				  <option value="">请选择用户类型...</option>
				  <option value="0">管理员</option>
				</select>
			</div>
			<div class="form-group">
				<input id="txtName" name="txtName" type="text" class="form-control" placeholder="请输入用户名称" required autofocus/>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="txtPwd" name="txtPwd" placeholder="请输入新密码" required autofocus /><span id="pwdTip" style="display:none;color:red;"></span>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="txtRePwd" name="txtRePwd" placeholder="请输入确认密码" required autofocus/><span id="rePwdTip" style="display:none;color:red;"></span>
			</div>
			<button type="submit" class="btn btn-default" onclick="return checkSave()">确认</button>
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
	
	var error = false;
	
	$("#txtPwd").blur(function(){
		var newpass = $("#txtPwd").val();
		if(newpass == '') {
			showError('pwd', '新密码不能为空');
			error = true;
		}
		else {
			$("#txtPwd").css({"border-color":"green"});
			$("#pwdTip").css({"display":"none"});
		}
	});

	$("#txtRePwd").blur(function(){
		var newpass = $("#txtPwd").val();
		if(newpass == '') {
			showError('rePwd', '确认密码不能为空');
			error = true;
			return;
		}

		var newpassAgain = $("#txtRePwd").val();
		if(newpassAgain != newpass) {
			showError('rePwd', '与输入的新密码不一致');
			error = true;
		}
		else {
			$("#txtRePwd").css({"border-color":"green"});
			$("#rePwdTip").css({"display":"none"});
		}
	});
	
	function showError(formSpan, errorText) {
		$("#" + formSpan).css({"border-color":"red"});
		$("#" + formSpan + "Tip").empty();
		$("#" + formSpan + "Tip").append(errorText);
		$("#" + formSpan + "Tip").css({"display":"inline"});
	}
	
	function checkSave()
	{
		$("#txtName").blur();
		$("#txtPwd").blur();
		$("#txtRePwd").blur();
		
		return error;
	}
});
<?php 
	$this->endBlock()
?>
<?php 
	$this->registerJs($this->blocks['test'],\yii\web\View::POS_END);
?>