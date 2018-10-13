@extends('admin.layouts.main')

@section('title')
    <title>Tambah Data Agama</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Data Agama</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.agama.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.agama.formAgama')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection