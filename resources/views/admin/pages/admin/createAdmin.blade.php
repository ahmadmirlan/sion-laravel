@extends('admin.layouts.main')

@section('title')
    <title>Tambah Data Dosen</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Input Data Admin</h4>

            <div class="card-body">
                {!! Form::open(array('route' => 'admin.user.store')) !!}
                {{ csrf_field() }}
                @include('admin.pages.admin.formAdmin')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection