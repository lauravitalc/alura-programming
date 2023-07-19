<x-layout title="New TV Serie">
    <x-form :action="route('series.store')" :name="old('name')" :update="false"/>
</x-layout>