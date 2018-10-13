@extends('admin.layouts.main')

@section('title')
    <title>Update Agama</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Update Agama</h4>

            <div class="card-body">
                {!! Form::model($agama, ['method' => 'PATCH', 'action' =>
                      ['admin\AgamaController@update', $agama->id]]) !!}
                {{ csrf_field() }}
                @include('admin.pages.agama.formAgama')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection