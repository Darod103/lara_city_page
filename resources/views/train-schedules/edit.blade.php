<x-app-layout title="Редактирование расписания">
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
        <h2 class="mb-4 text-center">Редактирование расписания</h2>
        <div class="card">
            <div class="card-body">
                <x-schedules-form :schedule="$schedule"  />
            </div>
        </div>
    </div>
</x-app-layout>
