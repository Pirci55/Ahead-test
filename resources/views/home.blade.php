@extends('layouts.html')

@section('head')
    @parent
    @vite('resources/less/home.less')
@endsection

@section('body')
    <main>
        <section class="stats">
            <div>
                <p>Кол-во животных в клетках: {{ $animalsInCages }}/{{ $animalsNotInCages }}</p>
                <p>Всего мест: {{ $cagesCapacity }}</p>
            </div>
        </section>
        <section class="cages">
            @foreach ($cages as $cage)
                <a class="cage" href="{{ route('cages', ['cage_id' => $cage->id]) }}">
                    <div>
                        <p class="name">{{ $cage->name }}</p>
                    </div>
                    <div>
                        <p class="capacity">{{ $cage->animals->count() }}/{{ $cage->capacity }} животных</p>
                    </div>
                </a>
            @endforeach
        </section>
    </main>
@endsection
