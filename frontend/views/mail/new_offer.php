<h2 style="font-size: 18px; text-align: center;">Добрый день, <?=$user['name'];?>!</h2>

<p>
Сообщаем, что Ваш конкурент <?=$today = date("d.m.Y H:i:s");?> в системе Zakupki-online.com изменил цену.
</p>
<p>
Обратите внимание на Ваше место в рейтинге:
</p>

<table width="100%" cellspacing="0" cellpadding="0" style="font-size: 12px; border-bottom: 1px solid #c4c9cb;">
    <?
    $cnt=1;
    foreach($user['offers'] as $offers){?>
        <tr>
            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offers['purchase_id'];?></td>
            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offers['title'];?></td>
            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offers['place'];?>/<?=$offers['totaloffers'];?></td>
            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offers['market'];?></td>
            <td style="border-top: 1px solid #c4c9cb;"><a href="http://<?=$_SERVER['HTTP_HOST'];?>/plan/list/#/auctions/add/<?=$offers['product_id'];?>" target="_blank" style="display: block; background: #67b56e; color: #ffffff; padding: 15px; text-decoration: none; text-align: center;">+</a></td>
            <td style="border-top: 1px solid #c4c9cb;"><a href="http://<?=$_SERVER['HTTP_HOST'];?>/plan/list/#/auctions/<?=$offers['product_id'];?>" target="_blank" style="display: block; background: #ff6600; color: #ffffff; padding: 15px; text-decoration: none; text-align: center;">x</a></td>
        </tr>
    <?
        $cnt++;
    }?>
</table>