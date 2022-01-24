<x-app-layout>
    <x-slot name="title">Search</x-slot>

    <x-slot name="navi"></x-slot>

    <x-slot name="header">
        {{ __('Search') }}
        <div class="back-link">
            &laquo; <a href="{{ 'home' }}">Home</a>
        </div>
    </x-slot>

    <x-slot name="top">
        <h1>Search results</h1>
        <p>検索結果を表示します。</p>
    </x-slot>

    <x-slot name="middle">
        <ul>
            @forelse ($posts as $post)
            @if (Auth::user()->id === $post->user_id)
                <li class="search-body">
                    <a href="{{ route('posts.show', $post) }}">
                        <div id="title">{{$post->title}}</div>
                    </a>
                        <div id="singer"><p>{{$post->singer}}</p></div>
                </li>
            @endif
            @empty
            <li id="empty-message">該当する検索結果が見つかりません。</li>
            @endforelse
        </ul>
    </x-slot>

    <x-slot name="under">
        <div class="pagenate-space">
                {{$posts->links('vendor.pagination.simple-default')}}
        </div>
    </x-slot>
</x-app-layout>
