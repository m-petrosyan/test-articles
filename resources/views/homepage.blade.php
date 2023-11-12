@extends('layouts.main')
@section('content')
    <div class="p-6 lg:p-8">
        <div class="mt-16">
            <div class="grid s:grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @foreach($articles as $article)
                    <div
                        class="flex max-w-sm flex-col  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{route('articles.show',$article->id)}}">
                            <img class="rounded-t-lg" src="{{$article->image}}" alt=""/>
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
@endsection
