<x-app-layout title="Новости">
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($allNews as $news)
                <x-news-card :news='$news'/>
            @endforeach
        </div>
    </div>
</x-app-layout>
