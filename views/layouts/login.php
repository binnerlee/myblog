<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
AppAsset::addCSSForHead($this,'@web/css/login.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language ?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?=Html::csrfMetaTags() ?>
	<title><?=Html::encode($this->title)?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody()?>

<div class="container">
<?=$content?>
</div> <!-- /container -->

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage() ?>