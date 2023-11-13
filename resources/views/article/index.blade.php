@extends('layouts.main')
@section('content')
    <div class="flex">
        <div style="width: 33%">
            <div class="mt-10 flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <button class="rounded-none bg-gray-500 px-5 text-white">{{$tag->name}}</button>
                @endforeach
            </div>
        </div>
        <div class="w-full">
            <div class="p-6 lg:p-8">
                <div class="mt-16">
                    <div class="flex flex-col gap-5">
                        @foreach($articles as $article)
                            <div
                                class="flex gap-5 flex-col bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="{{route('articles.show', $article->slug)}}">
                                    <div style="background-image: url({{$article->image}})"
                                         class="h-64 w-full bg-no-repeat bg-cover">
                                    </div>
                                </a>
                                <div class="p-5 h-full flex flex-col justify-between">
                                    <div class="content">
                                        <a href="{{route('articles.show',$article->id)}}">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{$article->title}}
                                            </h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{$article->description}}
                                        </p>
                                    </div>
                                    <x-like-component :article="$article"/>
                                </div>
                            </div>
                        @endforeach
                        {!!$articles->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
