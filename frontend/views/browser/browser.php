<h2>Вы используете устаревший браузер <?=$browser;?></h2>
<p>Пожалуйста, обновите его, и Вы сможете пользоваться нашей системой.</p>
<table class="browsers" align="center">
    <?
    if(isset($browsers[$browser]))
        $rand_keys = array_rand($otherbrowsers, 2);
    else
        $rand_keys = array_rand($otherbrowsers, 3);
    ?>

    <tr>
        <td>
            <a href="<?=$browsers[$rand_keys[0]]['url'];?>"><img src="/img/<?=$browsers[$rand_keys[0]]['img'];?>" alt="<?=$browsers[$rand_keys[0]]['name'];?>" title="<?=$browsers[$rand_keys[0]]['name'];?>"></a><br>
            <a class="old-button" href="<?=$browsers[$rand_keys[0]]['url'];?>"><?=$browsers[$rand_keys[0]]['name'];?></a>
        </td>
        <? if(isset($browsers[$browser])){?>
        <td>
            <a href="<?=$browsers[$browser]['url'];?>"><img src="/img/<?=$browsers[$browser]['img'];?>" alt="<?=$browsers[$browser]['name'];?>" title="<?=$browsers[$browser]['name'];?>"></a><br>
            <a class="old-button" href="<?=$browsers[$browser]['url'];?>"><?=$browsers[$browser]['name'];?></a>
        </td>
        <?}else{?>
            <td>
                <a href="<?=$browsers[$rand_keys[2]]['url'];?>"><img src="/img/<?=$browsers[$rand_keys[2]]['img'];?>" alt="<?=$browsers[$rand_keys[2]]['name'];?>" title="<?=$browsers[$rand_keys[2]]['name'];?>"></a><br>
                <a class="old-button" href="<?=$browsers[$rand_keys[2]]['url'];?>"><?=$browsers[$rand_keys[2]]['name'];?></a>
            </td>
        <?}?>
        <td>
            <a href="<?=$browsers[$rand_keys[1]]['url'];?>"><img src="/img/<?=$browsers[$rand_keys[1]]['img'];?>" alt="<?=$browsers[$rand_keys[1]]['name'];?>" title="<?=$browsers[$rand_keys[1]]['name'];?>"></a><br>
            <a class="old-button" href="<?=$browsers[$rand_keys[1]]['url'];?>"><?=$browsers[$rand_keys[1]]['name'];?></a>
        </td>
    </tr>
</table>