@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            Lūdzu, novērsiet radušās kļūdas!
        </div>
    @endif

    <form method="post" action="{{ $tv_show->exists ? '/tv_shows/patch/' . $tv_show->id : '/tv_shows/put' }}">
        @csrf


        <div class="mb-3">
            <label for="tv_show-name" class="form-label">Filmas nosaukums</label>

            <input
                type="text"
                id="tv_show-name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $tv_show->name) }}"
            >

            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="tv_show-director" class="form-label">Režisors</label>

            <select
                id="tv_show-director"
                name="director_id"
                class="form-select @error('director_id') is-invalid @enderror"
            >
                <option value="">Norādiet režisoru!</option>
                    @foreach($directors as $director)
                        <option
                            value="{{ $director->id }}"
                            @if ($director->id == old('director_id', $tv_show->director->id ?? false)) selected @endif
                        >{{ $director->name }}</option>
                    @endforeach
            </select>

            @error('director_id')
                <p class="invalid-feedback">{{ $errors->first('director_id') }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="tv_show-description" class="form-label">Apraksts</label>

            <textarea
                id="tv_show-description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description', $tv_show->description) }}</textarea>

            @error('description')
                <p class="invalid-feedback">{{ $errors->first('description') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tv_show-year" class="form-label">Izdošanas gads</label>

            <input
                type="number" max="{{ date('Y') + 1 }}" step="1"
                id="tv_show-year"
                name="year"
                value="{{ old('year', $tv_show->year) }}"
                class="form-control @error('year') is-invalid @enderror"
            >

            @error('year')
                <p class="invalid-feedback">{{ $errors->first('year') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tv_show-price" class="form-label">Cena</label>

            <input
                type="number" min="0.00" step="0.01" lang="en"
                id="tv_show-price"
                name="price"
                value="{{ old('price', $tv_show->price) }}"
                class="form-control @error('price') is-invalid @enderror"
            >

            @error('price')
                <p class="invalid-feedback">{{ $errors->first('price') }}</p>
            @enderror
        </div>

        //

        <div class="mb-3">
            <div class="form-check">
                <input
                    type="checkbox"
                    id="tv_show-display"
                    name="display"
                    value="1"
                    class="form-check-input @error('display') is-invalid @enderror"
                    @if (old('display', $tv_show->display)) checked @endif
                >
                <label class="form-check-label" for="tv_show-display">
                    Publicēt ierakstu
                </label>

                @error('display')
                    <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ $tv_show->exists ? 'Atjaunot' : 'Pievienot' }}</button>

    </form>

@endsection