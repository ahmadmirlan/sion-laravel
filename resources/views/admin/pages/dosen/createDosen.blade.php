@extends('admin.layouts.main')

@section('title')
    <title>Tambah Data Dosen</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Data Dosen</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.dosen.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.dosen.formDosen')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection