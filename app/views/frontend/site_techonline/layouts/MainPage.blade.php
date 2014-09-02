@extends('frontend.site_techonline.content')

<!-- СЕКЦИЯ: Основное меню сайта (Ссылки на разделы) -->
<section class="nav-bar">
    <nav>
        <ul role="menubar">
            <li><a href="index-2.html">Заказать стройтехнику</a></li>
            <li><a href="index-2.html">Сдать в аренду</a></li>
            <li><a href="index-2.html">Менеджерам</a></li>
            <li><a href="index-2.html">Запчасти и сервис</a></li>
        </ul>
    </nav>
</section>

<!-- СЕКЦИЯ: Анимированный баннер с кнопками -->
<section class="slider">
    <div class="slider-content">
        <img class="car" src="/img/techonline/belaz.png">
        <div>
            <a href="#">Арендовать стройтехнику</a>
            <a href="#">Разместить стройтехнику</a>
        </div>
    </div>
</section>

<!-- СЕКЦИЯ: Списки разделов сайта (Виды транспорта) -->
<section class="categories node push-center">
    <ul  class="h-list column-4 no-marks">
        <li>
            <img src="/img/techonline/ecscavations.png" alt="">
            <header class="list-header">
                <h3>Земляные работы</h3>
            </header>
            <ul>
                <li><a href="#">Автогрейдеры</a></li>
                <li><a href="#">Колёсные экскаваторы</a></li>
                <li><a href="#">Экскаваторы&ndash;погрузчики</a></li>
                <li><a href="#">Фронтальные погрузчики</a></li>
            </ul>
        </li>
        <li>
            <img src="/img/techonline/demontage.png" alt="">
            <header class="list-header">
                <h3>Демонтажные работы</h3>
            </header>
            <ul>
                <li><a href="#">Автогрейдеры</a></li>
                <li><a href="#">Колёсные экскаваторы</a></li>
                <li><a href="#">Экскаваторы&ndash;погрузчики</a></li>
                <li><a href="#">Фронтальные погрузчики</a></li>
            </ul>
        </li>
        <li>
            <img src="/img/techonline/montage.png" alt="">
            <header class="list-header">
                <h3>Монтажные работы</h3>
            </header>
            <ul>
                <li><a href="#">Автогрейдеры</a></li>
                <li><a href="#">Колёсные экскаваторы</a></li>
                <li><a href="#">Экскаваторы&ndash;погрузчики</a></li>
                <li><a href="#">Фронтальные погрузчики</a></li>
            </ul>
        </li>
        <li>
            <img src="/img/techonline/special-technics.png" alt="">
            <header class="list-header">
                <h3>Спецтехника</h3>
            </header>
            <ul>
                <li><a href="#">Автогрейдеры</a></li>
                <li><a href="#">Колёсные экскаваторы</a></li>
                <li><a href="#">Экскаваторы&ndash;погрузчики</a></li>
                <li><a href="#">Фронтальные погрузчики</a></li>
            </ul>
        </li>
    </ul>
</section>

<section class="categories node push-center">
    <ul class="h-list column-2 no-marks">
        <li>
            <div class="h-list column-2 catalogue fix types">
                <header class="list-header full-row">
                    <h3>Каталог строительной техники</h3>
                </header>
                <ul class="no-marks">
                    <li><a href="#">Автокраны</a></li>
                    <li><a href="#">Башенные краны</a></li>
                    <li><a href="#">Бетономешалки</a></li>
                    <li><a href="#">Бульдозеры</a></li>
                    <li><a href="#">Манипуляторы</a></li>
                </ul>
                <ul class="no-marks">
                    <li><a href="#">Автокраны</a></li>
                    <li><a href="#">Башенные краны</a></li>
                    <li><a href="#">Бетономешалки</a></li>
                    <li><a href="#">Бульдозеры</a></li>
                    <li><a href="#">Манипуляторы</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="h-list no-marks column-3 catalogue fix cars">
                <header class="list-header full-row">
                    <h3>Популярные производители</h3>
                </header>
                <ul>
                    <li><a href="#">1 Case</a></li>
                    <li><a href="#">2 Catterpillar</a></li>
                    <li><a href="#">3 Doosan</a></li>
                    <li><a href="#">4 Hidromek</a></li>
                    <li><a href="#">5 Hitachi</a></li>
                </ul>
                <ul>
                    <li><a href="#">6 Case</a></li>
                    <li><a href="#">7 Catterpillar</a></li>
                    <li><a href="#">8 Doosan</a></li>
                    <li><a href="#">9 Hidromek</a></li>
                    <li><a href="#">10 Hitachi</a></li>
                </ul>
                <ul>
                    <li><a href="#">11 Case</a></li>
                    <li><a href="#">12 Catterpillar</a></li>
                    <li><a href="#">13 Doosan</a></li>
                    <li><a href="#">14 Hidromek</a></li>
                    <li><a href="#">15 Hitachi</a></li>
                </ul>
            </div>
        </li>
    </ul>
</section>
<section class="how-to-use node push-center">
    <ul class="h-list column-2 no-marks">
        <li>
            <h3 role="heading">Как пользоваться сервисом</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui.
            </p>
            <ul class="how-to-steps icon-list v-list no-marks">
                <li>
                    <img src="/img/techonline/user-icon.png" alt="">
                    <a href="#">Зарегестрируйтесь</a> на сайте
                </li>
                <li>
                    <img src="/img/techonline/settings-icon.png" alt="">
                    Настройте свой профиль и внесите арендуюмую технику
                </li>
                <li>
                    <img src="/img/techonline/phone-icon.png" alt="">
                    Ждите звонков от заказчиков
                </li>
            </ul>
        </li>
        <li>
            <h3 role="heading">О сайте</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. is molestie elit, et lacinia ipsum quam nec dui.
            </p>
            <img src="/photo/techonline/stat-diagram.gif" alt="" class="stat-diagram">
        </li>
    </ul>
</section>
<!-- Поисковый фильтр -->
<section class="search-filter node push-center">
    <h3 role="heading">Поиск стройтехники</h3>
    <form action="#" method="get">
        <ul class="fix h-list column-3 no-marks">
            <li>
                <label for="">Регион</label>
                <select name=""><option value="">Не выбрано</option></select>
                <label for="">Город</label>
                <select name="">
                    <option selected value="">Не выбрано</option>
                    <option value="">Москва</option>
                </select>

            </li>
            <li>
                <label for="">Работы</label>
                <select name=""><option value="">Не выбрано</option></select>
                <label for="">Техника</label>
                <select name=""><option value="">Не выбрано</option></select>
            </li>
            <li>
                <label for="range-slider-1">Цена: <span id="range-slider-1-value"></span></label>
                <div class="range-slider" id="range-slider-1"></div>
                <label for="range-slider-2">Грузоподъемность: <span id="range-slider-2-value"></span></label>
                <div class="range-slider" id="range-slider-2"></div>
                <label for="range-slider-3">Скорость: <span id="range-slider-3-value"></span></label>
                <div class="range-slider" id="range-slider-3"></div>
            </li>
        </ul>
        <input class="search-submit button" type="submit" value="Искать">
    </form>
</section>

<!-- Последние Новости -->
<section class="news-feed r-list column-2 node push-center">

    <!--Левая часть: Последние новости -->
    <div class="snippet-list">

        <!--Заголовок: "Новости"-->
        <h3 role="heading">Последние новости</h3>

        <!-- Блок поста -->
        <article>

            <!-- Фото -->
            <a href="#"><img src="/photo/techonline/example-photo.jpg" alt=""></a>


            <!-- Краткое содержание -->
            <div>
                <!-- Заголовок -->
                <div class="fix">
                    <h3><a href="#">Новость первая</a></h3>
                </div>
                <p>Блоки тут имеют минимальную высоту в 200 пиксел.</p>
                <p>Крайне желательно ограничивать колличество текста в кратком содержании, чтобы не допускать разрыва по высоте, как показано на 3м сниппете</p>

                <!-- Дата публикации -->
                <footer class="post-date">
                    <small>19 января 2015</small>
                </footer>
            </div>

        </article>
        <!-- Блок поста -->
        <article>

            <!-- Фото -->
            <a href="#"><img src="/photo/techonline/example-photo.jpg" alt=""></a>

            <!-- Содержание -->
            <div>
                <!-- Заголовок -->
                <div class="fix">
                    <h3><a href="#">Новость вторая</a></h3>
                </div>

                <p>C помощью общих папок Dropbox можно организовать совместную работу над файлами.</p>
                <p>Когда пользователь присоединяется к общей папке, она появляется в его Dropbox и автоматически синхронизируется со всеми его компьютерами.</p>

                <!-- Дата публикации -->
                <footer class="post-date">
                    <small>19 января 2015</small>
                </footer>
            </div>

        </article>

        <!-- Блок поста -->
        <article>

            <!-- Фото -->
            <a href="#"><img src="/photo/techonline/example-photo.jpg" alt=""></a>

            <!-- Содержание -->
            <div>
                <!-- Заголовок -->
                <div class="fix">
                    <h3><a href="#">Новость третья</a></h3>
                </div>

                <p>C помощью общих папок Dropbox можно организовать совместную работу над файлами.</p>
                <p>Когда пользователь присоединяется к общей папке, она появляется в его Dropbox и автоматически синхронизируется со всеми его компьютерами.</p>

                <!-- Дата публикации -->
                <footer class="post-date">
                    <small>19 января 2015</small>
                </footer>
            </div>

        </article>
    </div>
    <!-- Правая часть: Исполнители -->
    <div class="snippet-list">

        <!--Заголовок: "Исполнители"-->
        <h3 role="heading">Исполнители</h3>

        <!-- Блок поста -->
        <article class="user-vip">
            <!-- Фото -->
            <a href="#"><img src="/photo/techonline/example-photo.jpg" alt=""></a>


            <!-- Краткое содержание -->
            <div>
                <!-- Заголовок -->
                <div class="fix">
                    <h3><a href="#">Исполнитель первый. У него длинный никнейм</a></h3>
                    <img src="/img/techonline/user-rating-3.png" alt="3 звезды" title="Рейтинг пользователя: 3 звезды" class="user-rating">
                </div>

                <p>C помощью общих папок Dropbox можно организовать совместную работу над файлами.</p>
                <p>Когда пользователь присоединяется к общей папке.</p>

                <!-- Откуда: город -->
                <footer class="location-from">
                    <small>Москва</small>
                </footer>
            </div>

        </article>
        <!-- Блок поста -->
        <article>

            <!-- Фото -->
            <a href="#"><img src="/photo/techonline/example-photo.jpg" alt=""></a>

            <!-- Содержание -->
            <div>
                <!-- Заголовок -->
                <div class="fix">
                    <h3><a href="#">Исполнитель второй</a></h3>
                    <img src="/img/techonline/user-rating-5.png" alt="5 звезд" title="Рейтинг пользователя: 5 звезд" class="user-rating">
                </div>

                <p>C помощью общих папок Dropbox можно организовать совместную работу над файлами.</p>
                <p>Когда пользователь присоединяется к общей папке, она появляется в его Dropbox и автоматически синхронизируется со всеми его компьютерами.</p><p>C помощью общих папок Dropbox можно организовать совместную работу над файлами.</p>
                <p>Когда пользователь присоединяется к общей папке, она появляется в его Dropbox и автоматически синхронизируется со всеми его компьютерами.</p>

                <!-- Откуда: город -->
                <footer class="location-from">
                    <small>Москва</small>
                </footer>
            </div>

        </article>

        <!-- Блок поста -->
        <article>

            <!-- Фото -->
            <a href="#"><img src="/photo/techonline/example-photo.jpg" alt=""></a>

            <!-- Содержание -->
            <div>
                <!-- Заголовок -->
                <div class="fix">
                    <h3><a href="#">Исполнитель третий</a></h3>
                    <img src="/img/techonline/user-rating-4.png" alt="4 звезды" title="Рейтинг пользователя: 4 звезды" class="user-rating">
                </div>

                <p>C помощью общих папок Dropbox можно организовать совместную работу над файлами.</p>
                <p>Когда пользователь присоединяется к общей папке, она появляется в его Dropbox и автоматически синхронизируется со всеми его компьютерами.</p>

                <!-- Откуда: город -->
                <footer class="location-from">
                    <small>Москва</small>
                </footer>
            </div>

        </article>
    </div>

</section>

<section class="nav-bar">
    <nav>
        <ul>
            <li><a href="index-2.html">Диспетчерам</a></li>
            <li><a href="index-2.html">О сервисе</a></li>
            <li><a href="index-2.html">Контактная информация</a></li>
        </ul>
    </nav>
</section>

