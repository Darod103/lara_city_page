<x-app-layout title="Расписание поездов">
    <div class="container my-4">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
        @endif
    </div>
    <div class="container">
        <h2 class="mb-4 text-center">Расписание поездов</h2>

        <div class="table-responsive-md">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr class="text-center">
                    <th class="text-nowrap">Место отправления</th>
                    <th class="text-nowrap">Дата и время отправления</th>
                    <th class="text-nowrap">Место прибытия</th>
                    <th class="text-nowrap">Дата и время прибытия</th>
                    @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'manager'))
                        <th class="text-nowrap">Действия</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($allSchedules as $schedule)

                    <tr>
                        <td>{{ $schedule->departure_location }}</td>
                        <td>{{ $schedule->departure_date }} {{ $schedule->departure_time }}</td>
                        <td>{{ $schedule->arrival_location }}</td>
                        <td>{{ $schedule->arrival_date }} {{ $schedule->arrival_time }}</td>

                        @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'manager'))
                            <td>
                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                    <a href="{{route('schedules.show',$schedule->id)}}" class="btn btn-sm btn-warning">Редактировать</a>
                                    <form action="{{route('schedules.destroy',$schedule->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
