<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DJ LIVING &amp; DANCE MUSIC</title>
    <link rel="stylesheet" href="/css/all.css" type="text/css" />
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/js/jquery.main.js"></script>
    <script type="text/javascript" src="/js/select.js"></script>
    <script type="text/javascript" src="/js/form.js"></script>
    <!--[if lte IE 8]><script type="text/javascript" src="/js/ie.js"></script><![endif]-->
    <!--[if lte IE 9]><script type="text/javascript" src="/js/pie.js"></script><![endif]-->
</head>
<body>
<div id="wrapper">
<div class="w1">
<div class="ad-panel">
    <a href="#"><img src="/images/ad1.jpg" alt="image description"></a>
</div>
<div class="navigation-panel">
    <div class="n-holder">
        <div class="n-frame">
            <nav id="nav">
                <ul>
                    <li<?=($this->id=='site' && $this->action->id=='index')?' class="active"':'';?>><a href="/">главная</a></li>
                    <li<?=($this->id=='article')?' class="active"':'';?>><a href="/article/">Почитать</a></li>
                    <li<?=($this->id=='event')?' class="active"':'';?>><a href="/event/">афиша</a></li>
                    <li<?=($this->id=='chronicle')?' class="active"':'';?>><a href="/chronicle/">хроника</a></li>
                    <li<?=($this->id=='music')?' class="active"':'';?>><a href="/music/">музыка</a></li>
                    <li<?=($this->id=='style')?' class="active"':'';?>><a href="/style/">стиль</a></li>
                    <li<?=($this->id=='tech')?' class="active"':'';?>><a href="/tech/">техника</a></li>
                    <li<?=($this->id=='place')?' class="active"':'';?>><a href="/place/">места</a></li>
                    <li<?=($this->id=='site' && $this->action->id=='contacts')?' class="active"':'';?>><a href="/site/contacts/">контакты</a></li>
                </ul>
            </nav>
            <!-- add class="select" -->
            <div class="enter-box<?=(yii::app()->user->getId())?' select':'';?>">
                <div class="personal-ico">
                    <a href="/cabinet/">
                        <img src="/images/personal-ico1.jpg" width="40" height="40" alt="imge description" />
                    </a>
                </div>
                <a href="#" class="btn-enter"><strong>вход</strong></a>
            </div>
        </div>
    </div>
</div>
<section class="social-panel">
    <ul class="social">
        <li><a href="#"><i class="icon-facebook"></i></a></li>
        <li class="ico-vk"><a href="#"><i class="icon-vkontakte-rect"></i></a></li>
    </ul>
    <div class="social-content">
        <i class="icon-twitter"></i>
        <span class="text"><a href="#">Ричи Хоутин в последнее время стал уделять пристальное внимание своему легендарному прошлому и готовит переиздание работ, выпущенных под именем Plastikman.</a></span>
    </div>
</section>
    <div id="main">
        <? if($this->id!='cabinet'){?>
        <aside id="sidebar">
            <div class="ad">
                <a href="#">
                    <img src="/images/ad2.jpg" width="200" height="400" alt="image description">
                </a>
            </div>
            <div class="ad small-width">
                <a href="#">
                    <img src="/images/ad7.jpg" width="200" height="480" alt="image description">
                </a>
            </div>
            <div class="social-tab">
                <ul class="tab-nav">
                    <li class="active"><a href="#">facebook</a></li>
                    <li class="vk"><a href="#">vk</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab active">
                        <div class="facebook-box">
                            <a href="#">
                                <img src="/images/facebook_box.jpg" width="178" height="419" alt="image description">
                            </a>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="facebook-box">
                            <a href="#">
                                <img src="/images/facebook_box.jpg" width="178" height="425" alt="image description">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ad">
                <a href="#">
                    <img src="/images/ad3.jpg" width="200" height="400" alt="image description">
                </a>
            </div>
            <div class="ad">
                <a href="#">
                    <img src="/images/ad4.jpg" width="200" height="400" alt="image description">
                </a>
            </div>
            <div class="ad">
                <a href="#">
                    <img src="/images/ad7.jpg" width="200" height="480" alt="image description">
                </a>
            </div>
            <article class="box music-box side-music">
                <h2 class="title-text"><a href="#">звуки</a><i class="icon-right-dir"></i></h2>
                <ul class="music-list">
                    <li>
                        <div class="photo">
                            <a href="#">
                                <img src="/images/img13.jpg" width="140" height="140" alt="image description">
                            </a>
                        </div>
                        <h3><a href="#">Francis Harris</a></h3>
                        <p>You Can Always Leave</p>
                        <ul class="star">
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                        </ul>
                    </li>
                    <li>
                        <div class="photo">
                            <a href="#">
                                <img src="/images/img15.jpg" width="140" height="140" alt="image description">
                            </a>
                        </div>
                        <h3><a href="#">Egyptrixx</a></h3>
                        <p>A/B Til Infinity</p>
                        <ul class="star">
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                        </ul>
                    </li>
                    <li>
                        <div class="photo">
                            <a href="#">
                                <img src="/images/img17.jpg" width="140" height="140" alt="image description">
                            </a>
                        </div>
                        <h3><a href="#">Various Artists</a></h3>
                        <p>Feral Grind</p>
                        <ul class="star">
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li><i class="icon-star-filled"></i></li>
                        </ul>
                    </li>
                    <li>
                        <div class="photo">
                            <a href="#">
                                <img src="/images/img16.jpg" width="140" height="140" alt="image description">
                            </a>
                        </div>
                        <h3><a href="#">Indigo</a></h3>
                        <p>Storm</p>
                        <ul class="star">
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li><i class="icon-star-filled"></i></li>
                            <li><i class="icon-star-filled"></i></li>
                        </ul>
                    </li>
                    <li>
                        <div class="photo">
                            <a href="#">
                                <img src="/images/img18.jpg" width="140" height="140" alt="image description">
                            </a>
                        </div>
                        <h3><a href="#">7 Days of Funk</a></h3>
                        <p>7 Days of Funk</p>
                        <ul class="star">
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                        </ul>
                    </li>
                    <li>
                        <div class="photo">
                            <a href="#">
                                <img src="/images/img14.jpg" width="140" height="140" alt="image description">
                            </a>
                        </div>
                        <h3><a href="#">Optimo</a></h3>
                        <p>Dark Was the Night</p>
                        <ul class="star">
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                            <li class="full"><i class="icon-star-filled"></i></li>
                        </ul>
                    </li>
                </ul>
            </article>
            <div class="ad small-width">
                <a href="#">
                    <img src="/images/ad4.jpg" width="200" height="400" alt="image description">
                </a>
            </div>
        </aside>
        <section id="content">
            <div class="header-box">
                <strong class="logo">
                    <a href="#">DJ LIVING &amp; BREATHING DANCE MUSIC</a>
                </strong>
                <div class="gallery">
                    <ul class="gmask">
                        <li>
                            <img src="/images/personal-ico2.jpg" width="130" height="130" alt="image description">
                            <div class="description">
                                <h2>Roy Davis</h2>
                                <p>Этот человек излучает вдохновение, как для своих коллег, так и для восторженных подражателей» ПитТонг, весна 2009 Свежие и яркие звуки электронной музыки когда-то соблазнили шестнадцатилетнего любителя гранжа Джеймса Забиелу на покупку первой пары примитивных вертушек. Промотаем эту историю вперёд...</p>
                            </div>
                        </li>
                        <li class="active">
                            <img src="/images/personal-ico2.jpg" width="130" height="130" alt="image description">
                            <div class="description">
                                <h2>Roy Davis</h2>
                                <p>2Этот человек излучает вдохновение, как для своих коллег, так и для восторженных подражателей» ПитТонг, весна 2009 Свежие и яркие звуки электронной музыки когда-то соблазнили шестнадцатилетнего любителя гранжа Джеймса Забиелу на покупку первой пары примитивных вертушек. Промотаем эту историю вперёд...</p>
                            </div>
                        </li>
                        <li>
                            <img src="/images/personal-ico2.jpg" width="130" height="130" alt="image description">
                            <div class="description">
                                <h2>Roy Davis</h2>
                                <p>3Этот человек излучает вдохновение, как для своих коллег, так и для восторженных подражателей» ПитТонг, весна 2009 Свежие и яркие звуки электронной музыки когда-то соблазнили шестнадцатилетнего любителя гранжа Джеймса Забиелу на покупку первой пары примитивных вертушек. Промотаем эту историю вперёд...</p>
                            </div>
                        </li>
                        <li>
                            <img src="/images/personal-ico2.jpg" width="130" height="130" alt="image description">
                            <div class="description">
                                <h2>Roy Davis</h2>
                                <p>4Этот человек излучает вдохновение, как для своих коллег, так и для восторженных подражателей» ПитТонг, весна 2009 Свежие и яркие звуки электронной музыки когда-то соблазнили шестнадцатилетнего любителя гранжа Джеймса Забиелу на покупку первой пары примитивных вертушек. Промотаем эту историю вперёд...</p>
                            </div>
                        </li>
                        <li>
                            <img src="/images/personal-ico2.jpg" width="130" height="130" alt="image description">
                            <div class="description">
                                <h2>Roy Davis</h2>
                                <p>5Этот человек излучает вдохновение, как для своих коллег, так и для восторженных подражателей» ПитТонг, весна 2009 Свежие и яркие звуки электронной музыки когда-то соблазнили шестнадцатилетнего любителя гранжа Джеймса Забиелу на покупку первой пары примитивных вертушек. Промотаем эту историю вперёд...</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="pagination">
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                    </ul>
                </div>
            </div>
        <?}?>
        <?=$content;?>
        </section>
    </div>
</div>
</div>
<footer id="footer">
    <div class="f-holder">
        <p class="copyright">&copy; dj mag</p>
        <a href="#" class="feedback-link"><strong>обратная связь</strong></a>
    </div>
</footer>
<div class="popup size2" id="enter" style="left: -9999px;">
    <span class="bg" style="height: 955px; width: 1905px;">&nbsp;</span>
    <div class="popup-box">
        <a href="#" class="btn-close"><i class="icon-cancel"></i></a>
        <article class="enter-block">
            <h2>вход</h2>
            <form action="/site/login" class="article-form" method="post">
                <div class="row">
                    <input type="text" id="LoginForm_email" name="LoginForm[email]" placeholder="email">
                </div>
                <div class="row">
                    <input type="password" id="LoginForm_password" name="LoginForm[password]" placeholder="пароль">
                </div>
                <div class="remember-link"><a href="#" id="forget-link">я забыл пароль</a></div>
                <div class="row">
                    <label class="check-label">
                        <input type="checkbox" id="LoginForm_rememberMe" name="LoginForm[rememberMe]" value="1">
                        <span class="text">Запомнить</span>
                    </label>
                    <button class="btn alignright"><strong>войти</strong></button>
                </div>
            </form>
            <div class="new-account"><a href="#" id="add-new-account">я новый пользователь</a></div>
        </article>
    </div>
</div>
<div class="popup size2" id="recapture-password" style="left: -9999px;">
    <span class="bg">&nbsp;</span>
    <div class="popup-box">
        <a href="#" class="btn-close"><i class="icon-cancel"></i></a>
        <article class="enter-block">
            <h2>Восстановление пароля</h2>
            <form action="#" class="article-form">
                <div class="row">
                    <input type="text" placeholder="email">
                </div>
                <div class="row">
                    <button class="btn alignright"><strong>сбросить пароль</strong></button>
                </div>
                <div class="note">На ваш электронный ящик будет выслано письмо со ссылкой для сброса пароля. Укажите новый пароль</div>
            </form>
            <div class="new-account"><a href="#" id="remember-link">я вспомнил пароль</a></div>
        </article>
    </div>
</div>
<div class="popup size2" id="registration" style="left: -9999px;">
    <span class="bg">&nbsp;</span>
    <div class="popup-box">
        <a href="#" class="btn-close"><i class="icon-cancel"></i></a>
        <article class="enter-block">
            <h2>регистрация</h2>
            <form action="#" class="article-form">
                <div class="row">
                    <input type="text" placeholder="email">
                </div>
                <div class="row">
                    <a href="#" class="info-registration"><strong>что мне даст<br>регистрация</strong></a>
                    <button class="btn alignright"><strong>регистрация</strong></button>
                </div>
                <div class="note">Укажите ваш электронный ящик. На этот адрес будет выслан пароль, который, при желании, вы всегда сможете поменять.</div>
            </form>
            <div class="new-account"><a href="#" id="registration-done">я уже регистрировался ранее</a></div>
        </article>
    </div>
</div>
<div class="popup size2" id="registration-info" style="left: -9999px;">
    <span class="bg">&nbsp;</span>
    <div class="popup-box">
        <a href="#" class="btn-close"><i class="icon-cancel"></i></a>
        <article class="enter-block">
            <h2>что даст регистрация</h2>
            <div class="registration-info-box">
                <h3>Contrary to popular belief</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim sem, pharetra ut neque et, pulvinar sagittis neque. Vivamus at nisl eu mauris pharetra aliquet.</p>
                <h3>hendrerit ut fringilla mattis in tellus</h3>
                <p>Maecenas arcu erat, gravida et mollis non, commodo.</p>
                <h3>Aenean iaculis</h3>
                <p>Pellentesque ac suscipit tellus, vulputate fringilla nibh. Nam et ligula vitae nibh pharetra ornare. Duis commodo enim eget leo sodales accumsan.</p>
            </div>
            <div class="new-account"><a href="#" id="registration-want">хочу зарегистрироваться</a></div>
        </article>
    </div>
</div>
</body>
</html>
