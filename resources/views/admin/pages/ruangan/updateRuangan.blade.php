@extends('admin.layouts.main')

@section('title')
    <title>Update Ruangan</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Update Ruangan</h4>

            <div class="card-body">
                {!! Form::model($ruangan, ['method' => 'PATCH', 'action' =>
                      ['admin\RuanganController@update', $ruangan->id]]) !!}
                {{ csrf_field() }}
                @include('admin.pages.ruangan.formRuangan')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection