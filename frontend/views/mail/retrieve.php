                                    <h2 style="font-size: 18px; text-align: center;">Добрый
                                        день, <?= $user->first_name; ?> <?= $user->last_name; ?>!</h2>

                                    <p>
                                        Если Вы действительно забыли пароль к вашему аккаунту и хотите восстановить его, перейдите по указаной ссылке <a href="http://<?=$_SERVER['HTTP_HOST'];?>/site/retrieve/?code=<?=$user->retrieve_code;?>">http://<?=$_SERVER['HTTP_HOST'];?>/site/retrieve/?code=<?=$user->retrieve_code;?></a></p>
                                    <p>
                                        Если вы не запрашивали восстановление пароля, просто проигнорируйте это сообщение.
                                    </p>
                                    <p>
                                        С уважением,<br/>
                                        служба поддержки Zakupki-online.com<br/>
                                        zakupki-online.com<br/>
                                        support@zakupki-online.com<br/>
                                    </p>
                                    <p>
                                        моб.: <?=Option::getOpt('support_phone');?><br/>
                                    </p>