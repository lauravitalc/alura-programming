<x-layout title="New TV Serie">
    <form action="/series/save" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <button type="submit">Add</button>
    </form>
</x-layout>