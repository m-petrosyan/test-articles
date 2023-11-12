@extends('layouts.main')
@section('content')
    <div class="p-6 lg:p-8">
        <div class="mt-16">
            <div class="grid s:grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @foreach($articles as $article)
                    <div
                        class="flex max-w-sm flex-col  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{route('article.show',$article->id)}}">
                            <img class="rounded-t-lg" src="{{$article->image}}" alt=""/>
                        </a>
                        <div class="p-5 h-full flex flex-col justify-between">
                            <div class="content">
                                <a href="{{route('article.show',$article->id)}}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{$article->title}}
                                    </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{$article->description}}
                                </p>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex items-center gap-2">
                                    @auth()
                                        <form action="{{ route('article.liketoggle',$article->id) }}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="icon icon-tabler icon-tabler-heart"
                                                     width="30"
                                                     height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                                     fill="none"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path
                                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{route('login')}}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="icon icon-tabler icon-tabler-heart"
                                                 width="30"
                                                 height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                                 fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                                            </svg>
                                        </a>
                                    @endauth
                                    <p>{{$article->likes_count}}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                         width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                        <path
                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                                    </svg>
                                    <p>{{$article->views}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {!!$articles->links()!!}
            </div>
        </div>
    </div>
@endsection
