@extends('admin.layouts.main')

@section('title')
    <title>Update Kelas</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Update Kelas</h4>

            <div class="card-body">
                {!! Form::model($kelas, ['method' => 'PATCH', 'action' =>
                      ['admin\KelasController@update', $kelas->id]]) !!}
                {{ csrf_field() }}
                @include('admin.pages.kelas.formKelas')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection