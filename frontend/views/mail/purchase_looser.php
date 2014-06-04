<h2>Добрый день, <?=$user['first_name'];?> <?=$user['last_name'];?>!</h2>
<p>
Сообщаем, что в системе Zakupki-online.com (<?=$user['buyer'];?>) не выбрал Ваше ценовое предложение по плану закупок (No.<?=$user['purchase_id'];?>).
</p>
<p>
    Выбранные предложения:
</p>
<p>
<table width="100%" cellspacing="0" cellpadding="0" style="font-size: 12px; border-bottom: 1px solid #c4c9cb;">
    <?
           if(isset($winners[$user['purchase_id']]))
           foreach($winners[$user['purchase_id']] as $offer){?>
                <tr>
                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offer['title'];?></td>
                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offer['price'];?> грн.</td>
                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb; border-right: 1px solid #c4c9cb;"><?=$offer['amount'];?> <?=$offer['unit'];?>.</td>
                </tr>
    <?}?>
</table>
<p>
    Ваши предложения:
</p>
<p>
<table width="100%" cellspacing="0" cellpadding="0" style="font-size: 12px; border-bottom: 1px solid #c4c9cb;">
    <?       foreach($offers as $offer){?>
        <tr>
            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offer['title'];?></td>
            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$offer['price'];?> грн.</td>
            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb; border-right: 1px solid #c4c9cb;"><?=$offer['amount'];?> <?=$offer['unit'];?>.</td>
        </tr>
    <?}?>
</table>
</p>