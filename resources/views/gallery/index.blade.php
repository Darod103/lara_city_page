<x-app-layout title="Галерея">
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="picture" required>
        <button type="submit">Загрузить</button>
    </form>
@foreach($pictures as $picture)
        <div>
            <form action="{{ route('gallery.vote', $picture->id) }}" method="POST">
                @csrf
                <button type="submit">👍 Лайк</button>
            </form>
            <img src="{{Storage::url($picture->url)}}" width="200" alt="picture">
            <p>Лайков: {{ $picture->votes_count }}</p>
        </div>
@endforeach
</x-app-layout>
