@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>
    <hr>
    
    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm">
            <thread class="">
                <tr>
                    <th>ID</th>
                    <th>Nosaukums</th>
                    <th>Režisors</th>
                    <th>Gads</th>
                    <th>Cena</th>
                    <th>Publicēts</th>
                    <th>Darbības</th>
                </tr>
            </thread>
            <tbody>

                @foreach($items as $tv_show)
                <tr>
                    <td>{{ $tv_show->id }}</td>
                    <td>{{ $tv_show->name }}</td>
                    <td>{{ $tv_show->director->name }}</td>
                    <td>{{ $tv_show->year }}</td>
                    <td>&euro; {{ number_format($tv_show->price, 2, '.') }}</td>
                    <td>{!! $tv_show->display ? '&#10004;&#65039;' : '&#10060;' !!}</td>
                    <td>
                        <a href="/tv_shows/update/{{ $tv_show->id }}" class="btn btn-outline-primary btn-sm">Labot</a> 
                        /
                        <form method="post" action="/tv_shows/delete/{{ $tv_show->id }}" class="deletion-form d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Dzēst</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    @else

        <p>Nav atrasts neviens ieraksts</p>

    @endif

    <a href="/tv_shows/create" class="btn btn-primary">Pievienot jaunu tv šovu</a>

@endsection
