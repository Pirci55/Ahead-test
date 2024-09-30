@extends('layouts.html')

@section('head')
    @parent
    @vite('resources/less/cages.less')
@endsection

@section('body')
    <main>
        <section>
            @if ($request->user())
                <form class="cage" action="{{ route('update_cage') }}" method="GET">
                    <input required name="cage_id" type="hidden" value="{{ $cage->id }}">
                    <div>
                        <label for="cage_id">Айди клетки</label>
                        <input required id="cage_id" type="number" disabled value="{{ $cage->id }}">
                    </div>
                    <div>
                        <label for="cage_name">Название клетки</label>
                        <input required id="cage_name" name="name" value="{{ $cage->name }}">
                    </div>
                    <div>
                        <label for="cage_capacity">Вместимость клетки</label>
                        <input required id="cage_capacity" name="capacity" min="{{ $cage->animals->count() }}"
                            type="number" value="{{ $cage->capacity }}">
                    </div>
                    <div class="buttons">
                        <input name="edit_cage" type="submit" value="Редактировать клетку">
                        <input name="delete_cage" type="submit" value="Удалить клетку">
                    </div>
                </form>
            @else
                <div class="cage">
                    <div>
                        <p>{{ $cage->name }}</p>
                    </div>
                    <div>
                        <p>{{ $cage->animals->count() }}/{{ $cage->capacity }} животных</p>
                    </div>
                </div>
            @endif

            @if ($request->user())
                <div class="set_cage">
                    <form action="{{ route('update_animal') }}" method="get">
                        <input required name="cage_id" type="hidden" value="{{ $cage->id }}">
                        <select required name="animal_id">
                            <option value="">-- выбрать животное --</option>
                            @foreach ($animals as $animal)
                                @unless ($animal->cage_id)
                                    <option value="{{ $animal->id }}">{{ $animal->species }} - {{ $animal->name }}</option>
                                @endunless
                            @endforeach
                        </select>
                        <input name="set_cage" type="submit" value="Разместить животное">
                    </form>
                </div>
            @endif
            <div class="animals">
                @foreach ($cage->animals as $animal)
                    <div class="animal">
                        <div class="stats">
                            <p>{{ $animal->species }} - {{ $animal->name }}</p>
                            <p>{{ $animal->description }}</p>
                            <p>Возраст (лет) - {{ $animal->age }}</p>
                        </div>
                        @if ($request->user())
                            <div class="buttons">
                                <a href="{{ route('animals', ['animal_id' => $animal->id]) }}">Редактировать
                                    животное</a>
                                <form action="{{ route('update_animal') }}" method="get">
                                    <input required name="animal_id" type="hidden" value="{{ $animal->id }}">
                                    <input required name="drop_cage" type="submit"
                                        value="Убрать животное из клетки">
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
