<h2>Добрый день<?=(isset($user))?", $user":"";?>!</h2>
<p>
Компания <?=$purchase->company->title;?> приглашает принят участие в торгах в системе <a href="http://<?=$_SERVER['HTTP_HOST'];?>/">Zakupki-online.com</a> по следующим товарам:
<p>
<table width="100%" cellspacing="0" cellpadding="0" style="font-size: 12px; border-bottom: 1px solid #c4c9cb;">
    <?      foreach($products as $product){?>
                <tr>
                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$product->tag->title;?></td>
                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$product->amount;?> <?=$product->unit->title2;?>.</td>
                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$purchase->address;?></td>
                    <td style="border-top: 1px solid #c4c9cb;"><a href="http://<?= $_SERVER['HTTP_HOST']; ?>/plan/list/#/auctions/add/<?=$product->id;?>" target="_blank" style="display: block; background: #67b56e; color: #ffffff; padding: 15px; text-decoration: none; text-align: center;">+</a></td>
                </tr>
    <?}?>
</table>
</p>
