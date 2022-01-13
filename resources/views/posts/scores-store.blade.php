<x-app-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>

    <x-slot name="top">
        <h1>Scores list</h1>
        <p>スコアを入力しADDボタンを押すと追加できます。</p>
    </x-slot>

    <x-slot name="middle">
        <form id="scores-add" method="post" action="{{ route('scores.store', $post) }}">
            @csrf

            <input type="text" name="body">
            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                Add
            </x-jet-button>
        </form>
    </x-slot>



    <x-slot name="under">
        <ul id="scores-index">
            @foreach ($post->scores()->latest()->get() as $score)
                <li>
                    {{ $score->body }}

                <form method="post" action="{{ route('scores.destroy', $score) }}"
                    class="delete-scores">
                    @method('DELETE')
                    @csrf

                    <button class="delete-btn">[X]</button>
                </form>
                </li>
            @endforeach
        </ul>
    </x-slot>


    <script>
        'use strict';

    {
        document.querySelectorAll('.delete-scores').forEach(form => {
            form.addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('Sure to delete?')) {
                    return;
                }

                form.submit();
            });
        });
    }

    </script>
</x-app-layout>
