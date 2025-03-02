<x-app-layout title="Новости">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-0">
                    @if($news->image_url)
                        <img src="{{ Storage::url($news->image_url) }}" class="card-img-top w-100" style="max-height: 500px; object-fit: cover;" alt="{{ $news->title }}">
                    @endif
                    <div class="card-body">
                        <h1 class="card-title text-center">{{ $news->title }}</h1>
                        <p class="text-muted text-center">Автор: {{ $news->author->name }} | {{ $news->created_at->format('d.m.Y H:i') }}</p>
                        <div class="news-text" style="font-size: 1.2rem; line-height: 1.6;">
                            {!! nl2br(e($news->text)) !!}
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Вернуться к новостям</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
