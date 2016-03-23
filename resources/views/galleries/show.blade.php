@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title clearfix">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $gallery->name }}
                                </a>

                                <button class="btn btn-default btn-sm pull-right" data-toggle="collapse"
                                        data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    Upload
                                </button>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div id="dropzone">
                                    <form action="/galleries/{{ $gallery->id }}/upload" class="dropzone needsclick" id="demo-upload">

                                        <div class="dz-message needsclick">
                                            Drop files here or click to upload.<br />
                                            <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                        </div>

                                        {{ csrf_field() }}

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">All photos</div>

                    <div class="panel-body">

                        <div class="row">
                            @foreach($gallery->photos as $photo)

                                <div class="col-xs-6 col-md-3">
                                    <a href="#" class="thumbnail">
                                        <img src="/photos/{{ auth()->user()->id }}/{{ $photo->name }}">
                                    </a>
                                </div>

                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
