                                    <h2 style="font-size: 18px; text-align: center;">Добрый
                                        день, <?= $user->first_name; ?> <?= $user->last_name; ?>!</h2>

                                    <p>
                                        Компания <?=$company->title;?> удалила вас из списка своих сотрудников. <br>
                                        Вы можете связаться с администратором компании по e-mail <?= $groupadmin->email; ?><br>
                                        Или создать свою компании по <a href="http://<?=$_SERVER['HTTP_HOST'];?>/user/profile/#/companies">ссылке</a>.
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