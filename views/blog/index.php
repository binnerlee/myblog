<?php 
	use yii\widgets\LinkPager;
?>
<div class="list-group">
	<?php foreach($arts as $t):?>
	<div class="list-group-item blog-item">
		<a class="blog-item-category" href="<?=Yii::$app->urlManager->createUrl(['blog/index?t='.$t['sortid']]) ?>"><?=$t['sortname']?><i></i></a>
		<h2 class="blog-item-title"><a href="<?=Yii::$app->urlManager->createUrl(['blog/detail/'.$t['gid']])?>"><?=$t['title']?></a></h2>
		<p class="blog-item-meta">
			<a href="#">Binner</a>发表于<?=$t['date']?>
		</p>
		<p>
		<?=$t['excerpt']?>
		</p>
		<p class="blog-item-meta blog-item-footer">
			阅读(<?=$t['attnum']?>)
		</p>
	</div>
	<?php endforeach; ?>
</div>
<?= LinkPager::widget(['pagination' => $pagination])?>