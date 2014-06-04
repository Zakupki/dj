<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>zakupki-online.com</title>
</head>
<body style="font-family: arial, sans-serif; font-size: 14px;">
<table width="580" align="center" cellspacing="0" cellpadding="20" bgcolor="#272a2b">
    <? $host="newzakupki.reactor.ua";?>
    <tr>
        <td>
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left"><a href="http://<?= $host; ?>/" target="_blank"
                                        style="color: #ffffff !important; text-decoration: none;	font-size: 14px; font-weight: bold;">zakupki-online.com</a>
                    </td>
                    <td align="center"><img src="http://<?= $host; ?>/img/zakupki-logo-email.gif" alt=""
                                            width="42" height="42"/></td>
                    <td align="right"><a style="color: #ffffff !important;	font-size: 14px; font-weight: bold;">+38
                            <?=Option::getOpt('support_phone');?></a></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table width="100%" cellspacing="0" cellpadding="20" bgcolor="#d4d9de">
                            <tr>
                                <td>
                                    <h2 style="font-size: 18px; text-align: center;">Добрый день, <?=$user['name'];?>!</h2>
                                    <p>В системе Zakupki-online открылись торги на:</p>
                                    <table width="100%" cellspacing="0" cellpadding="0" style="font-size: 12px; border-bottom: 1px solid #c4c9cb;">
                                        <? foreach($user['markets'] as $market){
                                            if(isset($products[$market])){
                                                foreach($products[$market] as $purchase){?>
                                                <tr>
                                                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$purchase['product'];?></td>
                                                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$purchase['amount'];?> <?=$purchase['unit'];?>.</td>
                                                    <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$purchase['address'];?></td>
                                                    <td style="border-top: 1px solid #c4c9cb;"><a href="http://<?= $host; ?>/plan/list/#/auctions/add/<?=$purchase['product_id'];?>" target="_blank" style="display: block; background: #67b56e; color: #ffffff; padding: 15px; text-decoration: none; text-align: center;">+</a></td>
                                                </tr>
                                                <?}
                                            }?>
                                        <?}?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>