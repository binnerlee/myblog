<?php 
	use yii\helpers\Html;
	$id = '';
	$name = '';
	if(isset($user))
	{
		$id = $user->uid;
		$name = $user->username;
	}
?>
<h2 class="sub-header">修改密码</h2>
<form action="<?= Yii::$app->urlManager->createUrl(['admin/modify-pwd']) ?>" method="post">
	<input id="txtId" name="txtId" type="hidden" value="<?=$id ?>"/>
	<div class="form-group">
		<input id="txtName" name="txtName" type="text" class="form-control" value="<?=$name ?>" disabled required autofocus/>
	</div>
	<div class="form-group">
		<input type="password" class="form-control" id="txtPwd" name="txtPwd" placeholder="请输入新密码" required autofocus/>
		<span id="pwdTip" style="display:none;color:red;"></span>
	</div>
	<div class="form-group">
		<input type="password" class="form-control" id="txtRePwd" name="txtRePwd" placeholder="请输入确认密码" required autofocus/>
		<span id="rePwdTip" style="display:none;color:red;"></span>
	</div>
	<button type="submit" class="btn btn-default" onclick="return checkSave()">确认</button>
</form>


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