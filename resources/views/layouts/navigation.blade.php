<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Мой Сайт</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home') ? 'active': ''}}" href="{{route('home')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('news.index') ? 'active': ''}}" href="{{route('news.index')}}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('gallery.index') ? 'active': ''}}" href="{{route('gallery.index')}}">Галерея</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('schedules.index') ? 'active': ''}}" href="{{route('schedules.index')}}">Расписание поездов</a>
                </li>
            </ul>
            <div class="ms-auto d-flex justify-content-end gap-2 flex-wrap">
               @guest
                    <a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#loginModal">Вход</a>
                @else
                    @if (Auth::user()->role === 'admin' || Auth::user()->role === 'manager')
                        <a  class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#newsForm">Добавить новость</a>
                        <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal">Добавить расписание</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выход</button>
                    </form>

                @endguest
            </div>
        </div>
    </div>
</nav>
<x-modal-auth/>
<x-modal-form-schedules />

