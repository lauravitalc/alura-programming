<x-layout title="Edit TV Serie '{!! $serie->name !!}' ">
        <form action="{{ route('series.update', $serie->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" 
                        id="name" 
                        name="name" 
                        class="form-control" 
                       value="{{ $serie->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

</x-layout>