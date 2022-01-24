<x-app-layout>
    <x-slot name="title">{{ 'EDIT' }} - {{ $post->title }}</x-slot>

    <x-slot name="navi"></x-slot>

    <x-slot name="header">
        {{ 'Edit' }}
        <div class="back-link">
            &laquo; <a href="{{ route('posts.show',$post) }}">Back</a>
        </div>
    </x-slot>

    <x-slot name="top">
        <h1>{{ 'Edit' }} - {{ $post->title }}</h1>
        <p>変更する情報を入力してください。</p>
    </x-slot>

    <x-slot name="middle">
        <form method="post" action="{{ route('posts.update', $post) }}">
            @method('PATCH')
            @csrf

        <div class="form-group">
            <label>
                Title
            <input class="title-form" type="text" name="title" value="{{ old('title', $post->title)}}">
            </label>
        </div>
         @error('title')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>
                Singer
                <input class="singer-form" type="text" name="singer" value="{{ old('singer', $post->singer)}}">
            </label>
        </div>
        @error('singer')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>
                Key
                <select name="key" id="key">
                    <option @if(old('key', $post->key) == -4) selected @endif>-4</option>
                    <option @if(old('key', $post->key) == -3) selected @endif>-3</option>
                    <option @if(old('key', $post->key) == -2) selected @endif>-2</option>
                    <option @if(old('key', $post->key) == -1) selected @endif>-1</option>
                    <option @if(old('key', $post->key) == 0) selected @endif>0</option>
                    <option @if(old('key', $post->key) == 1) selected @endif>1</option>
                    <option @if(old('key', $post->key) == 2) selected @endif>2</option>
                    <option @if(old('key', $post->key) == 3) selected @endif>3</option>
                    <option @if(old('key', $post->key) == 4) selected @endif>4</option>
                </select>
            </label>
            @error('key')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
                Rank
            <fieldset>
                <input type="radio" name="level" value="S" @if(old('level', $post->level) == "S") checked @endif>S
                <input type="radio" name="level" value="A" @if(old('level', $post->level) == "A") checked @endif>A
                <input type="radio" name="level" value="B" @if(old('level', $post->level) == "B") checked @endif>B
                <input type="radio" name="level" value="C" @if(old('level', $post->level) == "C") checked @endif>C
                <input type="radio" name="level" value="D" @if(old('level', $post->level) == "D") checked @endif>D
                <input type="radio" name="level" value="E" @if(old('level', $post->level) == "E") checked @endif>E
            </fieldset>

            @error('level')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>
                <legend>Body</legend>
                <textarea name="body">{{ old('body', $post->body)}}</textarea>
            </label>
        </div>
    </x-slot>

    <x-slot name="under">
            <div class="btn-space">
                <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                    Update
                </x-jet-button>
            </div>
        </form>
    </x-slot>

</x-app-layout>
