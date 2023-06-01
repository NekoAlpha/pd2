@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            Lūdzu, novērsiet radušās kļūdas!
        </div>
    @endif

    <form method="post" action="{{ $genre->exists ? '/genres/patch/' . $genre->id : '/genres/put' }}">
        @csrf


        <div class="mb-3">
            <label for="genre-name" class="form-label">Filmas nosaukums</label>

            <input
                type="text"
                id="genre-name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $genre->name) }}"
            >

            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="genre-director" class="form-label">Režisors</label>

            @error('director_id')
                <p class="invalid-feedback">{{ $errors->first('director_id') }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="genre-description" class="form-label">Apraksts</label>

            <textarea
                id="genre-description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description', $genre->description) }}</textarea>

            @error('description')
                <p class="invalid-feedback">{{ $errors->first('description') }}</p>
            @enderror
        </div>

        //

        <div class="mb-3">
            <div class="form-check">
                <input
                    type="checkbox"
                    id="genre-display"
                    name="display"
                    value="1"
                    class="form-check-input @error('display') is-invalid @enderror"
                    @if (old('display', $genre->display)) checked @endif
                >
                <label class="form-check-label" for="genre-display">
                    Publicēt ierakstu
                </label>

                @error('display')
                    <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ $genre->exists ? 'Atjaunot' : 'Pievienot' }}</button>

    </form>

@endsection