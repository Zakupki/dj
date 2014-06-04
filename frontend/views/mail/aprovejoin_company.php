                                    <h2 style="font-size: 18px; text-align: center;">Добрый
                                        день, <?= $groupadmin->first_name; ?> <?= $groupadmin->last_name; ?>!</h2>

                                    <p>
                                        Ваша заявка на присоединение к компании <?=$company->title;?> подтверждена.<br>
                                        Теперь вы можете просто закупать, продавать и торговаться,
                                        видеть аналитику по сделкам и находить новых деловых партнеров от имени комапании <?=$company->title;?>.
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