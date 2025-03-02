<div class="col">
    <div class="card h-100">
        @if($news->image_url)
            <img src="{{ Storage::url($news->image_url) }}" class="card-img-top" alt="{{ $news->title }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $news->title }}</h5>
            <p class="card-text">{{ Str::limit($news->text, 100) }}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Автор: {{$news->author->name}}</small>
            <a href="{{route('news.show',$news->id)}}" class="btn btn-primary btn-sm float-end">Читать далее</a>
        </div>
    </div>
</div>
