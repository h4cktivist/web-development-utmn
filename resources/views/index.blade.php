<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Футбольные клубы</title>
    @vite(['resources/sass/styles.sass', 'resources/js/index.js'])
</head>
<body>
<nav class="bg-primary navbar navbar-expand-lg p-0 m-2">
    <div class="container">
        <a class="navbar-brand text-dark pt-0 d-flex">
            <img src="img/football.png" class="align-text-top bg-secondary p-1" width="50" height="50">
            <div class="d-flex align-items-center justify-content-center ms-3 my-3">Футбольные клубы</div>
        </a>
        <button id="liveToastBtn" class="btn btn-secondary">Загрузить</button>
    </div>
</nav>

<div class="container text-center">
    <div class="h2 text-start my-3">Футбольные клубы</div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3 row-cols-xxxl-4 align-content-center">
        <div class="col text-start pb-3">
            <div class="card p-3 h-100">
                <img src="img/FC_Barcelona.png" class="card-img-top img-fluid p-5">
                <div class="badge position-absolute mt-2 ms-2 bg-secondary text-dark">Испания</div>
                <div class="card-body">
                    <h5 class="card-title">ФК Барселона</h5>
                    <p class="card-text">Испанский профессиональный футбольный клуб из одноимённого города. Основан в 1899 году группой швейцарских, британских, испанских и каталонских футболистов во главе с Жоаном Гампером.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Modal1" class="btn btn-secondary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col text-start pb-3">
            <div class="card p-3 h-100">
                <img src="img/FC_Real_Madrid_Logo.png" class="card-img-top img-fluid p-5" alt="...">
                <div class="badge position-absolute mt-2 ms-2 bg-secondary text-dark">Испания</div>
                <div class="card-body">
                    <h5 class="card-title">Реал Мадрид</h5>
                    <p class="card-text">Испанский профессиональный футбольный клуб из города Мадрид. Признан ФИФА лучшим футбольным клубом XX века. «Реал Мадрид» — один из трёх клубов, которые ни разу не покидали высший испанский дивизион</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Modal2" class="btn btn-secondary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col text-start pb-3">
            <div class="card p-3 h-100">
                <img src="img/Manchester_United_FC_crest.png" class="card-img-top img-fluid p-5" alt="...">
                <div class="badge position-absolute mt-2 ms-2 bg-secondary text-dark">Англия</div>
                <div class="card-body">
                    <h5 class="card-title">Манчестер Юнайтед</h5>
                    <p class="card-text">Английский профессиональный футбольный клуб из Траффорда, Большой Манчестер. Был основан в 1878 году под названием «Ньютон Хит (Ланкашир энд Йоркшир Рейлуэй)», в 1902 году изменил название на «Манчестер Юнайтед». Один из самых популярных футбольных клубов в мире. Один из основателей английской Премьер-лиги в 1992 году.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Modal3" class="btn btn-secondary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col text-start pb-3">
            <div class="card p-3 h-100">
                <img src="img/Santos_Logo.png" class="card-img-top img-fluid p-5" alt="...">
                <div class="badge position-absolute mt-2 ms-2 bg-secondary text-dark">Бразилия</div>
                <div class="card-body">
                    <h5 class="card-title">ФК Сантос</h5>
                    <p class="card-text">Бразильский футбольный клуб из города Сантус в штате Сан-Паулу. Клуб является одним из четырёх традиционных грандов своего штата и одним из традиционно сильнейших футбольных клубов Бразилии, сооснователем Клуба Тринадцати, организации самых популярных и титулованных клубов Бразилии.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Modal4" class="btn btn-secondary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col text-start pb-3">
            <div class="card p-3 h-100">
                <img src="img/FC_Bayern_München_logo_(2017).png" class="card-img-top img-fluid p-5" alt="...">
                <div class="badge position-absolute mt-2 ms-2 bg-secondary text-dark">Германия</div>
                <div class="card-body">
                    <h5 class="card-title">ФК Бавария</h5>
                    <p class="card-text">Немецкий футбольный клуб из города Мюнхен. Основан в 1900 году. Самый титулованный клуб Германии и один из самых титулованных клубов мира.</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#Modal5" class="btn btn-secondary">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center ms-4">
        <span class="mb-3 mb-md-0 text-body-secondary">© Вадим Попов</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex me-4">
        <li class="ms-3"><a href="https://github.com/h4cktiv1st"><img src="img/social.png" width="30" height="24" class="d-inline-block align-text-top img-fluid"></a></li>
        <li class="ms-3"><a href="https://vk.com"><img src="img/vk.png" width="30" height="24" class="d-inline-block align-text-top img-fluid"></a></li>
        <li class="ms-3"><a href="https://t.me/h4cktiv1st"><img src="img/telegram.png" width="30" height="24" class="d-inline-block align-text-top img-fluid"></a></li>
    </ul>
</footer>

<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="link-underline link-underline-opacity-0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Futbol Club Barcelona"><h5 class="modal-title">ФК Барселона</h5></a>
            </div>
            <div class="modal-body">
                <p>Испанский профессиональный футбольный клуб из одноимённого города. Основан в 1899 году группой швейцарских, британских, испанских и каталонских футболистов во главе с Жоаном Гампером.</p>
                <p>«Барселона» — самый титулованный клуб в Испании по общему количеству официальных трофеев — 77, включая 27 — титулов чемпиона Испании, 31 — Кубок Испании, 14 — Суперкубков Испании, 2 — Кубка испанской лиги и 3 — Кубка Эвы Дуарте.</p>
                <p>В международном клубном футболе «Барселона» завоевала 20 европейских и мировых титулов: 5 титулов Лиги чемпионов УЕФА, 4 рекордных Кубка обладателей кубков УЕФА, 3 Кубка ярмарок, 5 Суперкубков УЕФА и 3 клубных чемпионата мира.</p>
                <p>Представители «Барселоны» вместе с представителями мадридского «Реала» и баскского «Атлетика» стояли у истоков образования чемпионата Испании по футболу. При этом «Барселона» входит в число трёх команд, не покидавших высший испанский дивизион. Также «Барселона» является одним из самых дорогих спортивных клубов мира, занимая 18-е место со стоимостью 5,5 млрд долларов США.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="link-underline link-underline-opacity-0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Real Madrid Club de Fútbol"><h5 class="modal-title">Реал Мадрид</h5></a>
            </div>
            <div class="modal-body">
                <p>Испанский профессиональный футбольный клуб из города Мадрид. Признан ФИФА лучшим футбольным клубом XX века. «Реал Мадрид» — один из трёх клубов, которые ни разу не покидали высший испанский дивизион, двумя другими являются «Барселона» и «Атлетик Бильбао». Является одним из самых титулованных клубов в испанском футболе.</p>
                <p>На его счету 71 национальный трофей: 36 титулов чемпиона страны (рекорд), а также 20 Кубков Короля/Генералиссимуса, 13 Суперкубков Испании, 1 Кубок испанской лиги и 1 Кубок Эвы Дуарте. Является рекордсменом по количеству побед и голов в Лиге чемпионов (15 раз, единственная команда, выигрывавшая этот турнир — тогда ещё Кубок Европейских чемпионов — пять раз подряд, и единственная команда, выигрывавшая Лигу чемпионов в современном формате трижды подряд).</p>
                <p>Согласно данным пресс-службы клуба, по итогам сезона 2023/24 «Реал Мадрид» стал первым в истории, чей операционный доход суммарно превысил €1 млрд. В 2024 году согласно данным Forbes признан самым дорогим футбольным клубом мира, с совокупной стоимостью $6,6 млрд.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="link-underline link-underline-opacity-0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Manchester United Football Club"><h5 class="modal-title">Манчестер Юнайтед</h5></a>
            </div>
            <div class="modal-body">
                <p>Английский профессиональный футбольный клуб из Траффорда, Большой Манчестер. Был основан в 1878 году под названием «Ньютон Хит (Ланкашир энд Йоркшир Рейлуэй)», в 1902 году изменил название на «Манчестер Юнайтед». Один из самых популярных футбольных клубов в мире. Один из основателей английской Премьер-лиги в 1992 году.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="link-underline link-underline-opacity-0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Santos Futebol Clube"><h5 class="modal-title">ФК Сантос</h5></a>
            </div>
            <div class="modal-body">
                <p>Бразильский футбольный клуб из города Сантус в штате Сан-Паулу. Клуб является одним из четырёх традиционных грандов своего штата (наряду с «Сан-Паулу» (классико Сан-Сан), «Коринтиансом» (самое принципиальное противостояние) и «Палмейрасом») и одним из традиционно сильнейших футбольных клубов Бразилии, сооснователем Клуба Тринадцати, организации самых популярных и титулованных клубов Бразилии. В 2000 году «Сантос» занял пятое место в списке лучших футбольных клубов XX века по версии ФИФА.</p>
                <p>«Сантос» — единственный (из 12) бразильский традиционный суперклуб, базирующийся не в столице своего штата (город Сантус является морскими воротами для Сан-Паулу).</p>
                <p>Согласно решению Конфедерации футбола Бразилии от декабря 2010 года, победы в старом Кубке Бразилии (1959—1968) были приравнены к титулу чемпиона Бразилии. Таким образом, «Сантос» с восемью титулами, шесть из которых были завоёваны во времена Пеле, стал одним из самых титулованных клубов — чемпионов Бразилии (наряду с «Палмейрасом», которому были добавлены четыре титула).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="link-underline link-underline-opacity-0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Fußball-Club Bayern München e. V."><h5 class="modal-title" id="Modal1Text">ФК Бавария</h5></a>
            </div>
            <div class="modal-body">
                <p>Немецкий футбольный клуб из города Мюнхен. Основан в 1900 году. Самый титулованный клуб Германии и один из самых титулованных клубов мира.</p>
                <p>«Бавария» заняла 3-е место в списке лучших футбольных клубов XX века по версии ФИФА, 2-е место — по версии журнала Kicker. Также IFFHS поставил «Баварию» на 3-е место в рейтинге лучших европейских клубов XX века.</p>
                <p>«Бавария» является самым титулованным профессиональным футбольным клубом в Германии, на её счету 33 чемпионских титула и 20 Кубков Германии, 6 побед — в Лиге чемпионов. В конце 2013 команда стала первым немецким клубом, выигравшим клубный чемпионат мира.</p>
                <p>В 2020 году «Бавария» вновь сделала «золотой хет-трик», став вторым клубом в истории европейского футбола, завоевавшим «требл» дважды. Также в Лиге чемпионов стала первым клубом в истории, которому удалось выиграть все матчи в отдельно взятом сезоне.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <strong class="me-auto ms-2">Загрузка...</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-danger">
            На данный момент этот функционал недоступен!
        </div>
    </div>
</div>

</body>
</html>
