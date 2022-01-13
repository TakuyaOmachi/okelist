<x-app-layout>
    <x-slot name="title">{{ 'ADD' }}</x-slot>

    <x-slot name="navi"></x-slot>

    <x-slot name="header">
        {{ 'Add' }}
        <div class="back-link">
                &laquo; <a href="{{ route('home') }}">Home</a>
        </div>
    </x-slot>

    <x-slot name="top">
        <h1>Add new song</h1>
        <p>曲の情報を入力してください。</p>
    </x-slot>

    <x-slot name="middle">
        <form method="post" action="{{ route('posts.store') }}">
            @csrf

            <div class="form-group">
                <label>
                    Title
                <input class="title-form" type="text" name="title" value="{{ old('title')}}">
                </label>
            </div>
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>
                    Singer
                    <input class="singer-form" type="text" name="singer" value="{{ old('singer')}}">
                </label>
            </div>
            @error('singer')
            <div class="error">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>
                    Key
                    <select name="key" id="key">
                        <option>-4</option><option>-3</option>
                        <option>-2</option><option>-1</option>
                        <option selected>0</option>
                        <option>1</option><option>2</option>
                        <option>3</option><option>4</option>
                    </select>
                </label>
                @error('key')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                Rank
                <fieldset>
                    <input type="radio" name="level" value="S">S
                    <input type="radio" name="level" value="A">A
                    <input type="radio" name="level" value="B">B
                    <input type="radio" name="level" value="C">C
                    <input type="radio" name="level" value="D">D
                    <input type="radio" name="level" value="E">E
                </fieldset>
                @error('level')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <legend>Body</legend>
                    <textarea name="body"></textarea>
                </label>
            </div>

            <div class="add-user_id">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            </div>
    </x-slot>

    <x-slot name="under">
        <div class="btn-space">
            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                Create
            </x-jet-button>
        </div>
        </form>
    </x-slot>
</div>
</x-app-layout>
