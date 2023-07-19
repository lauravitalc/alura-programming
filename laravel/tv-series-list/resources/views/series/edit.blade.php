<x-layout title="Edit TV Serie '{{ $serie->name }}' ">
    <x-form :action="route('series.update', $serie->id)" :nome="$serie->name" :update="true"/>
</x-layout>