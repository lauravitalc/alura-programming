<x-layout title="TV Series">
    <a href="/series/create">Add new TV Serie</a>
    <ul>
        @foreach ($series as $serie)
        <li>{{ $serie->name }}</li>
        @endforeach
    </ul>
</x-layout>