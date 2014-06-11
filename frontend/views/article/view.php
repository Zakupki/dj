<section class="twocolumns">
<div class="twocolumns-holder scroll-column">
    <div class="post">
        <h1><?=$article->title;?></h1>
        <div class="social-holder">
            <ul class="social-network">
                <li>
                    <a href="#">
                        <img src="/images/ico-facebook1.png" width="73" height="20" alt="image description">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/ico-vk1.png" width="95" height="20" alt="image description">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/ico-twitter1.png" width="76" height="20" alt="image description">
                    </a>
                </li>
            </ul>
        </div>
        <div class="photo">
            <a href="#">
                <img src="/images/img25.jpg" width="480" height="480" alt="image description">
            </a>
        </div>
        <div class="content">
            <!--<p>Прошлый год для Шеклтона (<strong><mark>Sam Shackleton</mark></strong>) прошел довольно тихо. О новых релизах Сэма ничего не было слышно. Но, как докладывает Juno Plus, он начнет 2014-й новой EP, которую выпустит на собственном лейбле Woe To The Septic Heart. Согласно пресс-релизу, Freezing Opening Thawing включает три трека и продолжает славную традицию Шеклтона «уход от манипуляций с сэмплами в пользу синтеза» с добавлением фирменного перкуссионного стиля «психоделической грани». Отсюда следуют две EP Music for the Quiet Hour / The Drawbar Organ, вышедшие в апреле 2012 года, которые очень хвалили.</p>
            <p>Художественное оформление для этого релиза подготовил Зик Клоу (<strong><mark>Zeke Clough</mark></strong>), чьи отношения с Шеклтоном уходят корнями в эпоху лейбла Skull Disco (прим. Сэм закрыл лейбл в 2008 году).</p>-->
            <p><?=$article->detail_text;?></p>
        </div>
        <!--<div class="tracklist-box">
            <strong class="title">Tracklist:</strong>
            <ul class="tracklist">
                <li>01. Freezing Opening Thawing</li>
                <li>02. White Flower with Silvery Eye</li>
                <li>03. Silver Keys</li>
            </ul>
        </div>-->
        <div class="music-player-box">
            <img src="/images/music-playlist.jpg" width="480" height="156" alt="image description">
        </div>
        <div class="date-heading">
            <strong>Дата выхода<br />Freezing Opening Thawing — 20 января.</strong>
        </div>
        <div class="rating-holder">
            <div class="r-heading">
                <a href="#">
                    <img src="/images/logo2.png" width="85" height="20" alt="image description">
                </a>
            </div>
            <dl class="rating-star">
                <dt>Редакционный рейтинг</dt>
                <dd>
                    <ul class="star big-star">
                        <li class="full"><i class="icon-star-filled"></i></li>
                        <li class="full"><i class="icon-star-filled"></i></li>
                        <li class="full"><i class="icon-star-filled"></i></li>
                        <li class="full"><i class="icon-star-filled"></i></li>
                        <li><i class="icon-star-filled"></i></li>
                    </ul>
                </dd>
            </dl>
        </div>
        <article class="personal-box">
            <img src="/images/personal-ico3.jpg" width="90" height="90" alt="image description">
            <div class="description">
                <span class="profession">критик</span>
                <h3>Костя бударин</h3>
                <p>
                    <strong>Lorem ipsum dolor adipiscing elit.</strong><br />
                    Sagittis magna non tincidunt magna non tincidunt euismod.<br />
                    <strong>Lorem ipsum dolor sit ame adipiscing elit.</strong><br />
                    psum dolor sit amet, consectetur adipiscing elit. sagittis.<br />
                    <strong>Lorem ipsum consectetur adipiscing elit</strong><br />
                    psum dolor sit amet, consectetur adipiscing elit. sagittis.
                </p>
            </div>
        </article>
        <div class="some-title"><strong><?=$article->tags;?></strong></div>
        <div class="date-box">
            <span class="date">25.12.2013</span>
            <ul class="social-network">
                <li>
                    <a href="#">
                        <img src="/images/ico-facebook1.png" width="73" height="20" alt="image description">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/ico-vk1.png" width="95" height="20" alt="image description">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/images/ico-twitter1.png" width="76" height="20" alt="image description">
                    </a>
                </li>
            </ul>
        </div>
        <div class="comment-box">
            <span class="arrow">&nbsp;</span>
            <div class="c-content">
                <div class="comment-container">
                    <ul class="comment-list">
                        <li>
                            <a href="#"><img src="/images/personal-ico5.jpg" width="50" height="50" alt="image description"></a>
                            <div class="description">
                                <time class="time"><strong><a href="#">Entropy_88</a></strong> <mark>//</mark> Entropy_88</time>
                                <p>Sagittis magna non tincidunt magna non tincidunt euismod. Lorem ipsum dolor sit ame adipiscing elit psum dolor sit amet, consectetur adipiscing elit. sagittis.</p>
                            </div>
                        </li>
                        <li>
                            <a href="#"><img src="/images/personal-ico6.jpg" width="50" height="50" alt="image description"></a>
                            <div class="description">
                                <time class="time"><strong><a href="#">Alex_Bo</a></strong> <mark>//</mark> 22.02.14</time>
                                <p>Sagittis magna non tincidunt magna non tincidunt euismod. Lorem ipsum dolor sit ame adipiscing elit psum</p>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="btn size2"><strong>свернуть комментарии</strong></a>
                </div>
                <form action="#" class="comment-form">
                    <img src="/images/personal-ico7.jpg" width="50" height="50" alt="image description">
                    <div class="description">
                        <div class="row">
                            <div class="textarea">
                                <textarea cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <buttoon class="btn size2 alignright"><strong>комментировать</strong></buttoon>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="music-holder">
        <article class="box music-box">
            <h2 class="title-text"><a href="#">музыка</a><i class="icon-right-dir"></i></h2>
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
                            <img src="/images/img14.jpg" width="140" height="140" alt="image description">
                        </a>
                    </div>
                    <h3><a href="#">Optimo</a></h3>
                    <p>Dark Was the Night</p>
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
            </ul>
        </article>
        <a href="#" class="btn"><strong>предложить свою публикацию</strong></a>
    </div>
</div>
<div class="twocolumns-holder">
    <div class="col1">
        <div class="ad margin-b">
            <a href="#">
                <img src="/images/ad6.jpg" width="300" height="300" alt="image description">
            </a>
        </div>
        <article class="box style-box">
            <div class="photo">
                <a href="#">
                    <img src="/images/img7.jpg" alt="image description">
                </a>
            </div>
            <div class="content">
                <h2 class="title-text"><a href="#">стиль</a><i class="icon-right-dir"></i></h2>
                <h3>Постмодерн диско</h3>
            </div>
        </article>
    </div>
    <article class="box engineering-box small-width">
        <h2 class="title-text"><a href="#">техника</a><i class="icon-right-dir"></i></h2>
        <ul class="engineering-list">
            <li>
                <div class="photo">
                    <a href="#">
                        <img src="/images/img33.jpg" width="140" height="140" alt="image description">
                    </a>
                </div>
                <span class="title">Korg</span>
                <h3><a href="#">Kaossilator KO-1</a></h3>
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
                        <img src="/images/img34.jpg" width="140" height="140" alt="image description">
                    </a>
                </div>
                <span class="title">Native Instrument</span>
                <h3><a href="#">Traktor Kontrol S2</a></h3>
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
    <article class="box bill-box alignleft">
        <h2 class="title-text"><a href="#">афиша</a><i class="icon-right-dir"></i></h2>
        <ul class="bll-list">
            <li>
                <div class="photo">
                    <a href="#">
                        <img src="/images/img8.jpg" width="120" height="120" alt="image description">
                    </a>
                </div>
                <div class="description">
                    <time class="time"><strong>28.12.13</strong> <mark>//</mark> <strong>22:00 @ Closer</strong></time>
                    <span class="title">Episode 9</span>
                    <p><em>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincidunt euismod.</em></p>
                </div>
            </li>
            <li>
                <div class="photo">
                    <a href="#">
                        <img src="/images/img9.jpg" width="120" height="120" alt="image description">
                    </a>
                </div>
                <div class="description">
                    <time class="time"><strong>28.12.13</strong> <mark>//</mark> <strong>22:00 @ Closer</strong></time>
                    <span class="title">DJ Fomin</span>
                    <p><em>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincidunt euismod.</em></p>
                </div>
            </li>
            <li>
                <div class="photo">
                    <a href="#">
                        <img src="/images/img10.jpg" width="120" height="120" alt="image description">
                    </a>
                </div>
                <div class="description">
                    <time class="time"><strong>28.12.13</strong> <mark>//</mark> <strong>22:00 @ Closer</strong></time>
                    <span class="title">Wow-wow Dance</span>
                    <p><em>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincidunt euismod.</em></p>
                </div>
            </li>
            <li>
                <div class="photo">
                    <a href="#">
                        <img src="/images/img11.jpg" width="120" height="120" alt="image description">
                    </a>
                </div>
                <div class="description">
                    <time class="time"><strong>28.12.13</strong> <mark>//</mark> <strong>22:00 @ Closer</strong></time>
                    <span class="title">Marusha</span>
                    <p><em>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincidunt euismod.</em></p>
                </div>
            </li>
        </ul>
    </article>
    <article class="box alignleft event-box">
        <div class="photo">
            <a href="#">
                <img src="/images/img12.jpg" width="200" height="340" alt="image description">
            </a>
        </div>
        <div class="content">
            <h2>событие недели</h2>
            <strong class="date">13–19 января</strong>
            <time class="time"><strong>14.01.14</strong> <mark>//</mark> <strong>22:00</strong><br /><strong>@ Lab</strong></time>
            <span class="title">ORIGINS: Eats<br />Everything </span>
            <p><em>Lorem ipsum dolor sit,  consectetur adipiscing  elit. sagittis magna non Suspendisse mollis dolor sit amet, consectetur  adipiscing elit. Sed et  rhoncus malesuada...</em></p>
        </div>
    </article>
</div>
<span class="clear">&nbsp;</span>
<article class="box publication-box publication-width1">
    <h2 class="title-text"><a href="#">Публикации</a><i class="icon-right-dir"></i></h2>
    <div class="p-holder">
        <article class="event-box width1">
            <div class="photo">
                <a href="#">
                    <img src="/images/img20.jpg" width="200" height="340" alt="image description">
                </a>
            </div>
            <div class="content">
                <h2>откуда начался Berghain</h2>
                <p><em>Lorem ipsum dolor sit,  consectetur adipiscing  elit. sagittis magna non Suspendisse mollis dolor sit amet, consectetur  adipiscing elit. Sed et  rhoncus malesuada... </em></p>
                <time class="time no-margin">23.02.14 <mark>//</mark> <a href="#">2 комментария</a></time>
            </div>
        </article>
        <ul class="publication-list block-list">
            <li>
                <a href="#"><img src="/images/img21.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Рикардо Виллалобос, Принц Томас и другие в Arma17</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincid...</p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">8 комментариев</a></time>
                </div>
            </li>
            <li>
                <a href="#"><img src="/images/img26.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Лейбл Full Pupp отмечает 10 лет</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincid. Аdipiscing elit sagittis magna...</p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">1 комментарий</a></time>
                </div>
            </li>
            <li>
                <a href="#"><img src="/images/img22.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Pan Sonic выпускает живой альбом</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non. Аdipiscing elit sagittis magna... </p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">32 комментария</a></time>
                </div>
            </li>
            <li>
                <a href="#"><img src="/images/img27.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Brownswood исследует низкие частоты</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non. Аdipiscing elit sagittis magna...</p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">100 комментариев</a></time>
                </div>
            </li>
            <li>
                <a href="#"><img src="/images/img23.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Рикардо Виллалобос, Принц Томас и другие в Arma17</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincid...</p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">8 комментариев</a></time>
                </div>
            </li>
            <li>
                <a href="#"><img src="/images/img23.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Лейбл Full Pupp отмечает 10 лет</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non tincid. Аdipiscing elit sagittis magna...</p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">1 комментарий</a></time>
                </div>
            </li>
            <li>
                <a href="#"><img src="/images/img24.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Pan Sonic выпускает живой альбом</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non. Аdipiscing elit sagittis magna... </p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">32 комментария</a></time>
                </div>
            </li>
            <li>
                <a href="#"><img src="/images/img28.jpg" width="120" height="120" alt="image description"></a>
                <div class="description">
                    <h2><a href="#">Brownswood исследует низкие частоты</a></h2>
                    <p>Lorem ipsum dolor sit, consectetur adipiscing elit. sagittis magna non. Аdipiscing elit sagittis magna...</p>
                    <time class="time">21.02.14 <mark>//</mark> <a href="#">100 комментариев</a></time>
                </div>
            </li>
        </ul>
    </div>
</article>
</section>