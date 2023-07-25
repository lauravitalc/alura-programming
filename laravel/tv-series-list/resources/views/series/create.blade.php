<x-layout title="New TV Serie">
    <form action="{{ route('series.store') }}" method="post">
        @csrf    

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Name:</label>
                <input type="text" 
                        autofocus
                        id="name" 
                        name="name" 
                        class="form-control" 
                        value="{{ old('name') }}">
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">Seasons:</label>
                <input type="text" 
                        id="seasonsQty" 
                        name="seasonsQty" 
                        class="form-control" 
                        value="{{ old('seasonsQty') }}">
            </div>

            <div class="col-2">
                <label for="episodesSeason" class="form-label">Episodes/Season:</label>
                <input type="text" 
                        id="episodesSeason" 
                        name="episodesSeason" 
                        class="form-control" 
                        value="{{ old('episodesSeason') }}">
            </div>
                
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</x-layout>