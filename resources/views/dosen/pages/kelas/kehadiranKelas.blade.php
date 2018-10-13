@extends('dosen.layouts.main')

@section('title')
    <title>Kehadiran Kelas</title>
@endsection

@section('main_content')

    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Data Kelas</h4>
            <div class="card-body">
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Dosen</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\Dosen::where('id',$kehadiran[0]->id_dosen)->pluck('nama')->first()}}
                            </label>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <p><label class="btn btn-outline btn-primary">Ruangan</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\admin\Ruangan::where('id',$kehadiran[0]->id_ruangan)->pluck('ruangan')->first()}}
                            </label>
                        </p>
                    </div>
                </div>

                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Jam Kuliah</label>
                            <label class="btn btn-outline btn-success">{{$kehadiran[0]->jamKuliah}}</label></div>
                    </div>
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Jam Kuliah</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\admin\Matakuliah::where('id',$kehadiran[0]->id_matakuliah)->pluck('matakuliah')->first()}}
                            </label>
                        </div>
                    </div>
                </div>
                <hr>


                {!! Form::model($kehadiran, ['method' => 'PATCH', 'action' =>
                      ['dosen\KelasController@updateKehadiran', $kehadiran[0]->id_kelas, $pertemuan]]) !!}
                {{ csrf_field() }}
                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>Kehadiran</th>
                    </tr>
                    </thead>
                    <tbody>
                    @include('dosen.pages.kelas.data.formAbsensi')
                    </tbody>
                </table>

                <div class="row gap-y">
                    <div class="col-xl-6">
                        <button class="btn btn-primary">Update</button>
                        <a href="{{URL::previous()}}" class="btn btn-danger">Back</a>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection