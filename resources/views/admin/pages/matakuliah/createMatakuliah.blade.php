@extends('admin.layouts.main')

@section('title')
    <title>Tambah Data Mata Kuliah</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Data Mata Kuliah</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.matakuliah.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.matakuliah.formMatakuliah')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection