@extends('admin.layouts.main')

@section('title')
    <title>Update Dosen</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Update Dosen</h4>

            <div class="card-body">
                {!! Form::model($dosen, ['method' => 'PATCH', 'action' =>
                      ['admin\DosenController@update', $dosen->id]]) !!}
                {{ csrf_field() }}
                @include('admin.pages.dosen.formDosen')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection