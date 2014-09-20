<!-- СЕКЦИЯ: Верхнее меню сайта (Логотип + Вход) -->
<section class="Site-Header">

    <div class="Site-Header-Inner" role="banner">

        <div href="http://hardcore/catalog" class="Site-Logo">
            <div>
                <img class="Logo-Img" src="/img/techonline/logo.png"/>

                <h2>Стройтехника
                    <small>.Онлайн</small>
                </h2>
            </div>
            <a class="Link-Home" href="/">Вернуться на главную страницу</a>
        </div>

        <div id="Menu-Toggle"></div>
        <nav id="Menu" class="Site-Navigation Primary">
            <ul class="Menu-List">
                <li><a class="Menu-Link" href="/catalog" title="Каталог стройтехники">Каталог</a></li>
                <li><a class="Menu-Link" href="/rent" title="Взять стройтехнику в аренду">Аренда</a></li>
                <li><a class="Menu-Link" href="/parts">Запчасти и сервис</a></li>
                <li><a class="Menu-Link" href="/sellers">Арендодатели</a></li>
            </ul>
        </nav>

        <div class="Page-Auth">
            <button class="Button _Secondary _Rounded Sign-In">Войти</button>
            <button class="Button _Secondary _Rounded Sign-Up">Регистрация</button>

            <div class="Sign-In-UI" style="display:none;">
                <form class="Form-Horizontal" action="">
                    <h4>Авторизация</h4>
                    <div class="Control-Group">
                        <label for="Sign-In-Username">E&ndash;mail</label>
                        <input id="Sign-In-Username" type="text"/>
                    </div>

                    <div class="Control-Group">
                        <label for="Sign-In-Password">Пароль</label>
                        <input id="Sign-In-Password" type="password"/>
                    </div>

                    <div class="Control-Group Checkbox Submit Row Merge" for="Sign-In-Remember-Me">
                        <label class="Six">
                            <input id="Sign-In-Remember-Me" type="checkbox"/>Запомнить меня
                        </label>
                        <input class="class="Six" type="submit" value="Войти на сайт"/>
                    </div>

                </form>
            </div>


            <div class="Sign-Up-UI" style="display:none;">
                <form class="Form-Horizontal" action="">
                    <h4>Регистрация</h4>
                    <div class="Control-Group">
                        <label for="Sign-In-Username">E-mail</label>
                        <input id="Sign-In-Username" type="text"/>
                    </div>

                    <div class="Control-Group">
                        <label for="Sign-In-Password">Пароль</label>
                        <input id="Sign-In-Password" type="password"/>
                    </div>

                    <div class="Control-Group Checkbox Submit Row Merge" for="Sign-In-Remember-Me">
                        <label class="Six">
                            <input id="Sign-Up-Remember-Me" type="checkbox"/>Запомнить меня
                        </label>
                        <input class="class="Six" type="submit" value="Зарегистриваться"/>
                    </div>

                </form>
            </div>
        </div>

    </div>

</section>