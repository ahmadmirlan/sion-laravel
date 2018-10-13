@extends('admin.layouts.main')

@section('title')
    <title>Tambah Data Ruangan</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Data Ruangan</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.ruangan.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.ruangan.formRuangan')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection