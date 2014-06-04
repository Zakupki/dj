                                    <h2 style="font-size: 18px; text-align: center;">Добрый
                                        день, <?= $groupadmin->user->first_name; ?> <?= $groupadmin->user->last_name; ?>!</h2>

                                    <p>
                                        <?= $aplier->first_name; ?> <?= $aplier->last_name; ?> (<?=$aplier->email;?>, <?=$aplier->position;?>) хочет присоединиться к вашей компании <?=$company->title;?>.<br/>
                                        Если вы подтверждаете что это ваш сотрудник, перейдите по <a href="http://<?=$_SERVER['HTTP_HOST'];?>/user/profile/#/companies">ссылке</a>.
                                    </p>
                                    <p>По вопросам работы системы обращайтесь в службу поддержки.</p>
                                    <p>
                                        С уважением,<br/>
                                        служба поддержки Zakupki-online.com<br/>
                                        zakupki-online.com<br/>
                                        support@zakupki-online.com<br/>
                                    </p>
                                    <p>
                                        моб.: <?=Option::getOpt('support_phone');?><br/>
                                    </p>