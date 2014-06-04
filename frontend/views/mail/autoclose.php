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
                                <h2>Добрый день, <?=$user['first_name'];?> <?=$user['last_name'];?>!</h2>
                                <p>
                                    Сообщаем, что Вам необходимо закрыть простроченные торги в системе Zakupki-online, так как время их действия истекло и поставщики уже не могут в них участвовать:
                                </p>
                                <table width="100%" cellspacing="0" cellpadding="0" style="font-size: 12px; border-bottom: 1px solid #c4c9cb;">
                                    <?
                                    $cnt=1;
                                    if(isset($user['purchases']))
                                    foreach($user['purchases'] as $purchase_id=>$purchase){?>
                                        <tr>
                                            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$purchase_id;?></td>
                                            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=$purchase['market'];?></td>
                                            <td style="padding:15px; border-top: 1px solid #c4c9cb; border-left: 1px solid #c4c9cb;"><?=Yii::app()->dateFormatter->formatDateTime($purchase['date_close'], 'medium', 'medium');?></td>
                                        </tr>
                                        <?
                                        $cnt++;
                                    }?>
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
