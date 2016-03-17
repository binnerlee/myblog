<?php 
	use yii\widgets\LinkPager;
?>
<div class="list-group">
	<?php foreach($arts as $t):?>
	<div class="list-group-item blog-item">
		<?php if($t['sortname']): ?>
		<a class="blog-item-category" href="<?=Yii::$app->urlManager->createUrl(['blog/index?t='.$t['sortid']]) ?>"><?=$t['sortname'] ?><i></i></a>
		<?php else: ?>
		<a class="blog-item-category" href="<?=Yii::$app->urlManager->createUrl(['blog/index']) ?>">未分类<i></i></a>
		<?php endif; ?>
		<h2 class="blog-item-title"><a href="<?=Yii::$app->urlManager->createUrl(['blog/detail/'.$t['gid']])?>"><?=$t['title']?></a></h2>
		<p class="blog-item-meta">
			<?=$t['username']?>发表于<?=date('Y:m:d h:i:s',$t['date'])?>
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