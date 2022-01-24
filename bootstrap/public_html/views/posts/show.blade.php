<x-app-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>

    <x-slot name="navi"></x-slot>

    <x-slot name="header">
            About - {{ $post->title }}
        <div class="back-link">
            @foreach ($levels as $level)
                @if ($level === $post->level)
                    &laquo; <a href="{{route('posts.index', $level)}}">Index{{ $level }}</a>
                @endif
            @endforeach
        </div>
    </x-slot>

    <x-slot name="top">
        <h1>{{ $post->title }}</h1>
        <p>EDITボタンを押すと編集ができます。</p>
    </x-slot>

    <x-slot name="middle">
        <div class="show-part">
            <ul>
                <li>歌手名 : {{ $post->singer}}</li>
                <li>キー : {{ $post->key}}</li>
                <li>{!! nl2br(e($post->body)) !!}</li>
            </ul>
            <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
                <button class="delete-btn">[X]</button>
                @method('DELETE')
                @csrf
            </form>
        </div>
    </x-slot>

    <x-slot name="under">
        <div class="btn-space">
            <form action="{{ route('posts.edit', $post) }}">
                <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                    Edit
                </x-jet-button>
            </form>
        </div>
    </x-slot>

    <x-jet-section-border />

    @include('posts.scores-store')

    <script>
        'use strict';

        {
            document.getElementById('delete_post').addEventListener('submit', e =>{
                e.preventDefault();

                if(confirm('Sure to delete?')){
                    e.target.submit();
                }
                    return;
            });
        }
    </script>

</x-app-layout>

