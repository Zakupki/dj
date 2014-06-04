                                    <h2 style="font-size: 18px; text-align: center;">Добрый
                                        день, <?= $user->first_name; ?> <?= $user->last_name; ?>!</h2>

                                    <p>
                                        Благодарим Вас за регистрацию в системе онлайн торгов Zakupki-online.com.</p>
                                    <p>
                                        Для подтверждения регистрации Вам необходимо перейти по <a href="http://<?=$_SERVER['HTTP_HOST'];?>/site/activate/?activation_code=<?=$user->activation_code;?>">ссылке</a>.
                                    </p>
                                    <p>
                                        Ваш email: <?= $user->email; ?><br/>
                                        Ваш пароль: <?= $password; ?>
                                    </p>

                                    <p>
                                        В ближайшее время с Вами свяжется проектный менеджер.
                                    </p>

                                    <p>
                                        Для того чтобы познакомится c zakupki-online.com читайте на каждой странице "Краткое знакомство"
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