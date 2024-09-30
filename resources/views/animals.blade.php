@extends('layouts.html')

@section('head')
    @parent
    @vite('resources/less/animals.less')
@endsection

@section('body')
    <main>
        <section>
            <form action="{{ route('update_animal') }}" method="GET">
                <input required name="animal_id" type="hidden" value="{{ $animal->id }}">
                <div class="stats">
                    <div>
                        <label for="animal_id">Айди животного</label>
                        <input required id="animal_id" type="number" disabled value="{{ $animal->id }}">
                    </div>
                    <div>
                        <label for="animal_species">Вид животного</label>
                        <input required id="animal_species" name="species" value="{{ $animal->species }}">
                    </div>
                    <div>
                        <label for="animal_name">Имя животного</label>
                        <input required id="animal_name" name="name" value="{{ $animal->name }}">
                    </div>
                    <div>
                        <label for="animal_description">Описание животного</label>
                        <input required id="animal_description" name="description" value="{{ $animal->description }}">
                    </div>
                    <div>
                        <label for="animal_age">Возраст животного</label>
                        <input required id="animal_age" name="age" value="{{ $animal->age }}">
                    </div>
                    <div>
                        <label for="animal_cage">Клетка животного</label>
                        <select id="animal_cage" name="cage_id">
                            @isset($animal->cage)
                                <option value="{{ $animal->cage->id }}">{{ $animal->cage->name }}
                                    {{ $animal->cage->animals->count() }}/{{ $animal->cage->capacity }}</option>
                            @else
                                <option value="">-- выбрать клетку --</option>
                            @endisset
                            @foreach ($cages as $cage)
                                @if ($animal->cage_id != $cage->id)
                                    <option value="{{ $cage->id }}">{{ $cage->name }} {{ $cage->animals->count() }}/{{ $cage->capacity }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="buttons">
                    <input name="edit_animal" type="submit" value="Обновить информацио о животном">
                    <input name="drop_cage" type="submit" value="Убрать животное из клетки">
                    <input name="delete_animal" type="submit" value="Удалить животное">
                </div>
            </form>
        </section>
    </main>
@endsection
