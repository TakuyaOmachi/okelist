<x-app-layout>
    <x-slot name="title">INDEX - {{$levels}}</x-slot>

    <x-slot name="navi"></x-slot>

    <x-slot name="header">
        Index - {{ $levels }}
        <div class="back-link">
            &laquo; <a href="{{ route('home') }}">Back</a>
        </div>
    </x-slot>

    <x-slot name="top">
        <h1>Index - {{$levels}}</h1>
        <p>曲を選択してください。</p>
    </x-slot>

    <x-slot name="middle">
        <ul>
            @forelse ($posts as $post)
                @if (Auth::user()->id === $post->user_id)
                    @if ($levels === $post->level)
                    <li>
                        <a href="{{ route('posts.show', $post, $levels) }}">
                            {{ $post->title }}
                        </a>
                            {{ $post->key }}
                    </li>
                    @endif
                @endif
            @empty
                <li id="empty-message">まだ投稿がありません。</li>
            @endforelse
        </ul>
    </x-slot>

    <x-slot name="under">
        <div class="btn-space">
            {{-- ルートの構築ができない為、コメントアウトする。 --}}
            {{-- <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                <a href="{{ route('posts.create')}}">Add</a>
            </x-jet-button> --}}
        </div>
    </x-slot>
</x-app-layout>

