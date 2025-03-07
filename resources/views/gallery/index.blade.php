<x-app-layout title="Галерея">
    <div class="container my-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="uploadForm" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data"
                      class="mb-4">
                    @csrf
                    <input type="file" id="picture" name="picture" class="d-none" required
                           onchange="document.getElementById('uploadForm').submit()">

                    <button type="button" class="btn btn-primary w-100"
                            onclick="document.getElementById('picture').click();">
                        Выбрать и загрузить картинку
                    </button>
                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($pictures as $picture)
                <x-picture-card :picture='$picture'/>
            @endforeach
        </div>
    </div>
</x-app-layout>
