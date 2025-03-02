<x-app-layout title="Новости">
    @foreach($allNews as $post)
        <div>
            <h1>{{$post->title}}</h1>
            <p>{{$post->text}}</p>
        </div>
    {{$post->author->name}}
{{--        @dd($post)--}}
    @endforeach
</x-app-layout>

