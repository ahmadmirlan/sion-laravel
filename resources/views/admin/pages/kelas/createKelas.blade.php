@extends('admin.layouts.main')

@section('title')
    <title>Tambah Data Kelas</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Data Kelas</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.kelas.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.kelas.formKelas')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection