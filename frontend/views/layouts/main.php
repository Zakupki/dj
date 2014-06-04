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
                    <li class="active"><a href="/">главная</a></li>
                    <li><a href="/article/">Почитать</a></li>
                    <li><a href="#">афиша</a></li>
                    <li><a href="#">хроника</a></li>
                    <li><a href="#">музыка</a></li>
                    <li><a href="#">стиль</a></li>
                    <li><a href="#">техника</a></li>
                    <li><a href="#">места</a></li>
                    <li><a href="#">контакты</a></li>
                </ul>
            </nav>
            <!-- add class="select" -->
            <div class="enter-box">
                <div class="personal-ico">
                    <a href="#">
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
        <?=$content;?>
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
            <form action="#" class="article-form">
                <div class="row">
                    <input type="text" placeholder="логин">
                </div>
                <div class="row">
                    <input type="password" placeholder="пароль">
                </div>
                <div class="remember-link"><a href="#" id="forget-link">я забыл пароль</a></div>
                <div class="row">
                    <label class="check-label">
                        <input type="checkbox" checked="checked">
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
