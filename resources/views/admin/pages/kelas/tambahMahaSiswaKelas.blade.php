@extends('admin.layouts.main')

@section('title')
    <title>Tambah Peserta Kelas</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Tambah Peserta Kelas</h4>
            <div class="card-body">
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Dosen</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\Dosen::where('id',$kelas->id_dosen)->pluck('nama')->first()}}
                            </label>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <p><label class="btn btn-outline btn-primary">Ruangan</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\admin\Ruangan::where('id',$kelas->id_ruangan)->pluck('ruangan')->first()}}
                            </label>
                        </p>
                    </div>
                </div>

                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Jam Kuliah</label>
                            <label class="btn btn-outline btn-success">{{$kelas->jamKuliah}}</label></div>
                    </div>
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Mulai Kuliah</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\admin\Matakuliah::where('id',$kelas->id_matakuliah)->pluck('matakuliah')->first()}}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Selsai Kuliah</label>
                            <label class="btn btn-outline btn-success">{{$kelas->jamSelesaiKuliah}}</label></div>
                    </div>
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Hari</label>
                            <label class="btn btn-outline btn-success">
                                {{$kelas->hariPerkuliahan}}
                            </label>
                        </div>
                    </div>
                </div>
                <hr>

                {!! Form::open(array('route' => 'admin.kelas.tambahMahasiswaStore')) !!}
                {{ csrf_field() }}

                <div class="row">
                    {{--Form select mahasiswa Start--}}
                    <?php
                    if($errors->has('id_mahasiswa'))
                        $getError = 'is-invalid';
                    else
                        $getError = '';
                    ?>
                    <div class="col-md-4">
                        <hr class="d-md-none">
                        <div class="form-group">

                            {!! Form::label('id_kelas','NIM Mahasiswa') !!}
                            {!! Form::select('id_kelas', \App\Mahasiswa::whereNOTIn('id',function($query) use ($kelas){
                                $query->select('id_mahasiswa')->from('kelas_mahasiswa_relation')
                                ->where('id_kelas','=', $kelas->id);
                            })->pluck('nim', 'id'), null,
                                 ['class' => 'form-control', 'data-provide' => 'selectpicker','data-live-search' => 'true',
                                  'name' => 'id_mahasiswa']) !!}
                            @if ($errors->has('id_mahasiswa'))
                                <ul class="parsley-errors-list filled" id="parsley-id-4">
                                    <li class="parsley-required">{{ $errors->first('id_mahasiswa') }}</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                    {{--Form select mahasiswa END--}}

                    <div class="col-md-4">
                        <hr class="d-md-none">
                        <div class="form-group">
                            {!! Form::label('id_kelas','Kode Kelas') !!}
                            {!! Form::number('id_kelas',$kelas->id,['class' => 'form-control',
                                'id' => 'id_kelas','readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <hr>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-danger" href="{{route('admin.kelas.index')}}">Kembali</a>
                        </div>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection