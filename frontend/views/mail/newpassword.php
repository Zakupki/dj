                                    <h2 style="font-size: 18px; text-align: center;">Добрый
                                        день, <?= $user->first_name; ?> <?= $user->last_name; ?>!</h2>

                                    <p>
                                        Вы успешно восстановили доступ к вашему аккаунту.
                                    </p>
                                    <p>
                                        Данные для доступа:<br>
                                        Email: <?=$user->email;?><br>
                                        Пароль: <?=$password;?><br>
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