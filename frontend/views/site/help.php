<div class="tutorial-slides-src" id="tutorial-slides-1">
	<ul>
        <? foreach($helps as $h){?>
        <li class="item">
			<div class="img">
                <? if(isset($h->image)){
                    echo $h->image->asHtmlImage();
                }?>
            </div>
			<div class="title"><?=$h->title;?></div>
			<div class="txt"><?=$h->detail_text;?></div>
		</li>
        <?}?>
	</ul>
</div>
