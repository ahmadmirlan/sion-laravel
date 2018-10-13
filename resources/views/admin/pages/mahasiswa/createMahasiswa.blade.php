@extends('admin.layouts.main')

@section('title')
    <title>Tambah Data Mahasiswa</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Data Mahasiswa</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.mahasiswa.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.mahasiswa.formMahasiswa')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection