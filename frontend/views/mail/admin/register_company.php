                                    <h2 style="font-size: 18px; text-align: center;">Добрый день!</h2>
                                    <p>
                                        Пользователь <a href="http://<?=$_SERVER['HTTP_HOST'];?>/backend.php?r=user/update&id=<?=$user->id;?>"><?= $user->first_name; ?> <?= $user->last_name; ?></a><br>
                                        добавил организацию <a href="http://<?=$_SERVER['HTTP_HOST'];?>/backend.php?r=companygroup/update&id=<?=$company->companygroup_id;?>"><?=$company->title;?></a>
                                        и компанию  <a href="http://<?=$_SERVER['HTTP_HOST'];?>/backend.php?r=company/update&id=<?=$company->id;?>"><?=$company->title;?></a>
                                    </p>