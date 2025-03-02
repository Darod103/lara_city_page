<div id="newsForm" class="collapse">
    <div class="card card-body">
        <form method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок новости</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Текст новости</label>
                <textarea class="form-control" id="content" name="text" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>
