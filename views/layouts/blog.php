<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
AppAsset::addCSSForHead($this,'@web/css/dashboard.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="../favicon.ico"/>
</head>
<body>
<?php $this->beginBody() ?>

<?php
NavBar::begin([
	'brandLabel' => 'Binner',
	'brandUrl' => Yii::$app->urlManager->createUrl(['blog/index']),
	'options' => [
		'class' => 'navbar-inverse navbar-fixed-top',
	],
]);
echo Nav::widget([
	'options' => ['class' => 'navbar-nav navbar-right'],
	'items' => [
		Yii::$app->user->isGuest ? '' :
		[
			'label' => Yii::$app->user->identity->username,
			'url' => ['/admin/modify-pwd']
		],
		['label' => '设置', 'url' => ['/admin/index']],
		Yii::$app->user->isGuest ?
		['label' => '登录', 'url' => ['/login']] :
		[
			'label' => '登出 (' . Yii::$app->user->identity->username . ')',
			'url' => ['/site/logout'],
			'linkOptions' => ['data-method' => 'post']
		],
	],
]);
NavBar::end();
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
		  <ul class="nav nav-sidebar">
			<li class="active"><a href="#">操作列表</a></li>
			<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/art']) ?>">写文章</a></li>
			<li><a href="#">草稿箱</a></li>
			<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/articles']) ?>">文章列表</a></li>
			<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/types']) ?>">分类列表</a></li>
			<li><a href="<?=Yii::$app->urlManager->createUrl(['admin/users']) ?>">用户列表</a></li>
		  </ul>
		  <ul class="nav nav-sidebar">
			<li class="active"><a href="#">以下功能暂时不做</a></li>
			<li><a href="">标签</a></li>
			<li><a href="">评论</a></li>
			<li><a href="">微语</a></li>
			<li><a href="">侧边栏</a></li>
			<li><a href="">导航</a></li>
			<li><a href="">页面</a></li>
			<li><a href="">链接</a></li>
			<li><a href="">数据</a></li>
			<li><a href="">插件</a></li>
			<li><a href="">模板</a></li>
		  </ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<?=$content ?>
		</div>
	</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
