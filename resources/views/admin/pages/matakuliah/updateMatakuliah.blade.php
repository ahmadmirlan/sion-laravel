@extends('admin.layouts.main')

@section('title')
    <title>Update Mata Kuliah</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Update Mata Kuliah</h4>

            <div class="card-body">
                {!! Form::model($matakuliah, ['method' => 'PATCH', 'action' =>
                      ['admin\MatakuliahController@update', $matakuliah->id]]) !!}
                {{ csrf_field() }}
                @include('admin.pages.matakuliah.formMatakuliah')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection