<div class="col">
    <div class="card h-100">
        <div class="img-container">
            <img src="{{ Storage::url($picture->url) }}" class="card-img-top" alt="picture">
        </div>
        <p class="card-text text-center mt-2">Лайков: {{ $picture->votes_count }}</p>
        <div class="card-body d-flex flex-column justify-content-end">
            @if(auth()->check())
                @if(!$hasVoted)
                    <form action="{{ route('gallery.vote', $picture->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 mb-2">👍 Лайк</button>
                    </form>
                @else
                    <p class="text-success text-center fw-bold">✅ Вы уже голосовали</p>
                @endif
            @endif
            @if(auth()->check() && (auth()->user()->id === $picture->user_id || auth()->user()->role === 'admin'))
                <form action="{{ route('gallery.destroy', $picture->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">🗑 Удалить</button>
                </form>
            @endif
        </div>
    </div>
</div>
