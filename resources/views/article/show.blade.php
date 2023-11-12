@extends('layouts.main')
@section('content')
    <div id="article-page" data-id="{{$article->id}}">
        <div>
            <div>
                <div>
                    <div>
                        <h3 class="font-bold">{{$article->title}}</h3>
                    </div>
                    <div style="background-image: url({{$article->image}})"
                         class="h-96 w-full bg-no-repeat bg-cover"/>
                </div>
                <x-like-component :article="$article"/>
                <div class="mt-2">
                    @foreach($article->tags as $tag)
                        <button class="rounded-none bg-gray-500 px-5 text-white">{{$tag->name}}</button>
                    @endforeach
                </div>
                <div class="mt-5">
                    <p>{{$article->description}}</p>
                </div>
            </div>
            <div class="mt-10">
                <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                    <div class="mx-auto px-4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments</h2>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h2 id="messages"></h2>
                        <div class="mb-6">
                            <input id="subject" class=" w-full border-gray-200 dark:bg-gray-800 dark:border-gray-700"
                                   type="text" name="subject" placeholder="title">
                            <div
                                class="mt-5 py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea id="body" rows="6" name="body"
                                          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                          placeholder="Write a comment..." required></textarea>
                            </div>
                            @auth()
                                <button type="submit" id="add-comment"
                                        class="bg-blue-500 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Post comment
                                </button>
                            @else
                                <a type="submit"
                                   class="bg-blue-500 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
                                   href="{{route('login')}}">Post comment</a>
                            @endauth
                        </div>
                    </div>
                </section>
                <div id="comments">
                    @foreach($article->comments as $comment)
                        <article
                            class="p-6 mb-3 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        {{$comment->user->name}}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time pubdate datetime="{{$comment->created_at}}"
                                              title="March 12th, 2022">{{$comment->created_at}}
                                        </time>
                                    </p>
                                </div>
                            </footer>
                            <h3 class="text-gray-500 dark:text-gray-400 font-semibold">
                                {{$comment->subject}}
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 font-light">
                                {{$comment->body}}
                            </p>
                        </article>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
