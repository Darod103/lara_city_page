<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Мой Сайт</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Галерия</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Расписание поездов</a>
                </li>
            </ul>
            <div class="ms-auto text-end mt-2 mt-lg-0">
               @guest
                    <a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#loginModal">Вход</a>
                @else
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выход</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
@include('components.modal')
