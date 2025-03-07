<div class="col">
    <div class="card h-100">
        <div class="img-container">
            <img src="{{ Storage::url($picture->url) }}" class="card-img-top" alt="picture">
        </div>
        <p class="card-text text-center mt-2">Лайков: {{ $picture->votes_count }}</p>
        <div class="card-body d-flex flex-column justify-content-end">
            <form action="{{ route('gallery.vote', $picture->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary w-100 mb-2">👍 Лайк</button>
            </form>
            <form action="{{ route('gallery.destroy', $picture->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">🗑 Удалить</button>
            </form>
        </div>
    </div>
</div>
