<h2 class="blog-post-title"><?=$art['title']?></h2>
<p class="blog-post-meta">
	<span><?=$art['username']?>发表于<?=date("Y-m-d h:i:s",$art['date'])?></span>
	<span>分类：<?=$art['sortname']?></span>
	<span>阅读：<?=$art['attnum']?></span>
</p>
<hr>
<?=$art['content']?>