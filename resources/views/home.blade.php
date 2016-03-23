@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <div id="dropzone">
                        <form action="/upload" class="dropzone needsclick" id="demo-upload">

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
</div>
@endsection
