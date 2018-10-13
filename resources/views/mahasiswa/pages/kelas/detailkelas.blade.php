@extends('mahasiswa.layouts.main')

@section('title')
    <title>Detail Kelas</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Detail Kelas</h4>
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
                        <div><label class="btn btn-outline btn-primary">Mata Kuliah</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\admin\Matakuliah::where('id',$kelas->id_matakuliah)->pluck('matakuliah')->first()}}
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>NIM</th>
                        <th>Nama</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $mhs)
                            <tr class="bg-secondary">
                                <th scope="row">{{$mhs->nim}}</th>
                                <td>{{$mhs->nama}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection