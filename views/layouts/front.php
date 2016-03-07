<?php 
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
AppAsset::addCSSForHead($this,'@web/css/blog.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
	<head>
		<meta charset="<?=Yii::$app->charset?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
	<?php $this->beginBody() ?>
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="<?=Yii::$app->urlManager->createUrl(['blog/index']) ?>">首页</a>
        </nav>
      </div>
    </div>
    <div class="container-fluid blog-main">
      <div class="blog-header">
        <h1 class="blog-title">Bookstrap博客</h1>
        <p class="lead blog-description">这是使用Bookstrap开发的一个博客系统。</p>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-10 blog-left">
            <div class="blog-post">
			    <?=$content?>
            </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->
        <div class="col-xs-6 col-sm-3 col-md-2 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>关于</h4>
            <p>这里写的都是关于<em>Binner</em>的一些介绍.</p>
          </div>
		  <!--
          <div class="sidebar-module">
            <h4>文章</h4>
            <ol class="list-unstyled">
              <li><a href="#">2014年12月（10）</a></li>
              <li><a href="#">2014年11月（10）</a></li>
              <li><a href="#">2014年10月（10）</a></li>
              <li><a href="#">2014年9月（10）</a></li>
              <li><a href="#">2014年8月（10）</a></li>
              <li><a href="#">2014年7月（10）</a></li>
              <li><a href="#">2014年6月（10）</a></li>
              <li><a href="#">2014年5月（10）</a></li>
              <li><a href="#">2014年4月（10）</a></li>
              <li><a href="#">2014年3月（10）</a></li>
              <li><a href="#">2014年2月（10）</a></li>
              <li><a href="#">2014年1月（10）</a></li>
              <li><a href="#">2013年12月（10）</a></li>
              <li><a href="#">2013年11月（10）</a></li>
              <li><a href="#">2013年10月（10）</a></li>
              <li><a href="#">2013年9月（10）</a></li>
              <li><a href="#">2013年8月（10）</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>联系方式</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
		  -->
        </div><!-- /.blog-sidebar -->
      </div><!-- /.row -->
    </div><!-- /.container -->
    <footer class="blog-footer">
      <p>This is Binner's blog.</p>
      <p>
        <a href="main.html">Back to top</a>
      </p>
    </footer>
	<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>