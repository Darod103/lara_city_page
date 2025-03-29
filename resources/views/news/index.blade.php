<x-app-layout title="Новости">
    <div class="container mt-4">
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
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($allNews as $news)
                <x-news-card :news='$news'/>
            @endforeach
        </div>
    </div>
</x-app-layout>
