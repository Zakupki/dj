<h2>Добрый день, <?=$user['first_name'];?> <?=$user['last_name'];?>!</h2>
<p>
    Вы являетесь участником торгов №<?=$user['purchase_id'];?> по <?=$user['product'];?> от <?=$user['company'];?>.
    Так как ваше ценовое предложение заинтересовало <?=$user['company'];?>, Вы приглашены в <a href="http://<?=$_SERVER['HTTP_HOST'];?>/plan/list/#/auctions">редукцион</a> который стартует  <?=$date;?>
</p>
<p>Если Вы отказываетесь принимать участие в редукционе, в нем автоматически будет участвовать Ваше конечное ценовое предложение по этим торгам.
</p>
