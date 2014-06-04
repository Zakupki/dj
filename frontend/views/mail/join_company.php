                                    <h2 style="font-size: 18px; text-align: center;">Добрый
                                        день, <?= $user->first_name; ?> <?= $user->last_name; ?>!</h2>

                                    <p>
                                        Вы пытаетесь зарегистрировать компанию <?=$company->title;?> с кодом ЕРДПОУ <?=$company->egrpou;?>.<br>
                                        Данная компания уже существует в системе. Для присоединения к этой компании необходимо получить подтверждение администратора (<?=$groupadmin->user->first_name;?> <?=$groupadmin->user->last_name;?>), о том что Вы являетесь сотрудником компании.</br>
                                        Ожидайте подтверждения.
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