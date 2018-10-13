@extends('admin.layouts.main')

@section('title')
    <title>Tambah Program Studi</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Program Studi</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.prodi.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.jurusan.formJurusan')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection