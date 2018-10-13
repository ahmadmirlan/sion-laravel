@extends('admin.layouts.main')

@section('title')
    <title>Update Program Studi</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Update Program Studi</h4>

            <div class="card-body">
                {!! Form::model($jurusan, ['method' => 'PATCH', 'action' =>
                      ['admin\JurusanController@update', $jurusan->id]]) !!}
                {{ csrf_field() }}
                @include('admin.pages.jurusan.formJurusan')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection