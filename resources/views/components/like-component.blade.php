<div class="flex justify-between w-full">
    <div class="likes flex items-center gap-2">
        @auth()
            <div>
                @csrf
                <button class="like-toggle" data-article="{{$article->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="icon icon-tabler icon-tabler-heart"
                         width="30"
                         height="30" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="#2c3e50"
                         fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                    </svg>
                </button>
            </div>
        @else
            <a href="{{route('login')}}">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="icon icon-tabler icon-tabler-heart"
                     width="30"
                     height="30" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#2c3e50"
                     fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path
                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                </svg>
            </a>
        @endauth
        <p class="likes-count">{{$article->likes_count}}</p>
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
        <p class="views-count">{{$article->views}}</p>
    </div>
</div>
