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
        {{ $serie->name }}
        <form action="{{ route('series.destroy', $serie->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sn">
                X
            </button>
        </form>
        </li>
        @endforeach
    </ul>
</x-layout>