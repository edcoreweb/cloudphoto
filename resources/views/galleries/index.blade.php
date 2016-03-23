@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Galleries</div>

                    <div class="panel-body">

                        <button class="btn btn-primary" type="button" onclick="openModal()">Add Gallery</button>

                        <ul>
                            @foreach($galleries as $gallery)
                                <li><a href="/galleries/{{ $gallery->id }}">{{ $gallery->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
