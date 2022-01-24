<x-app-layout>
    {{-- ページ名 --}}
    <x-slot name="title">HOME</x-slot>

    {{-- ナビゲーション --}}
    <x-slot name="navi"></x-slot>

    {{-- ヘッダー --}}
    <x-slot name="header">{{ __('Home') }}</x-slot>

    {{-- 本文 --}}
        <x-slot name="top">
            <h1>{{ Auth::user()->name }}</h1>
            <p>ランクを選択してください。</p>
        </x-slot>

        <x-slot name="middle">
            <ul>
                @foreach ($levels as $level)
                    <li>
                        <a href="{{ route('posts.index', $level) }}">
                            RANK {{ $level }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </x-slot>

        <x-slot name="under">
            <div class="btn-space">
                <form action="{{ route('posts.create')}}">
                    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                        Add
                    </x-jet-button>
                </form>
            </div>
        </x-slot>

</x-app-layout>
