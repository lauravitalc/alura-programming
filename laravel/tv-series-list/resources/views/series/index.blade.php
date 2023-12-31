<x-layout title="TV Series">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Add new TV Serie</a>

    @isset($msgSuccess)
    <div class="alert alert-success">
        {{ $msgSuccess }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="{{ route('seasons.index', $serie->id) }}">{{ $serie->name }}</a>
        <span class="d-flex">
            <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">E</a>
            <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sn">
                    X
                </button>
            </form>
        </span>
        </li>
        @endforeach
    </ul>
</x-layout>