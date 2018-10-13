@extends('admin.layouts.main')

@section('title')
    <title>Update Mahasiswa</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Update Mahasiswa</h4>

            <div class="card-body">
                {!! Form::model($mahasiswa, ['method' => 'PATCH', 'action' =>
                      ['admin\MahasiswaController@update', $mahasiswa->id]]) !!}
                {{ csrf_field() }}
                @include('admin.pages.mahasiswa.formMahasiswa')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection