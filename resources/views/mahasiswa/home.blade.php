@extends('mahasiswa.layouts.main')

@section('title')
    <title>Mahasiswa - Home</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Selamat Datang: {{$mahasiswa->nama}}</h4>

            <div class="card-body">
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">NIM</label>
                            <label class="btn btn-outline btn-success">
                                {{$mahasiswa->nim}}
                            </label>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <p><label class="btn btn-outline btn-primary">Nama</label>
                            <label class="btn btn-outline btn-success">
                                {{$mahasiswa->nama}}
                            </label>
                        </p>
                    </div>
                </div>

                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Prodi</label>
                        <label class="btn btn-outline btn-success">
                            {{\App\admin\Jurusan::where('id',$mahasiswa->jurusan_id)->pluck('jurusan')->first()}}
                        </label>

                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Agama</label>
                            <label class="btn btn-outline btn-success">
                                {{\App\admin\Agama::where('id',$mahasiswa->agama_id)->pluck('agama')->first()}}
                            </label>
                        </div>
                    </div>

            </div>
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Email</label>
                        <label class="btn btn-outline btn-success">
                            {{$mahasiswa->email}}
                        </label>

                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div><label class="btn btn-outline btn-primary">Tanggal Lahir</label>
                            <label class="btn btn-outline btn-success">
                                {{$mahasiswa->tanggalLahir}}
                            </label>
                        </div>
                    </div>
            </div>

                <hr>

                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>ID Kelas</th>
                        <th>Dosen</th>
                        <th>Ruangan</th>
                        <th>Mata Kuliah</th>
                        <th>Jam Kuliah</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kelas as $kls)
                        <?php
                            $dataKelas = \App\admin\Kelas::where('id',$kls->id_kelas)->first();
                        ?>
                        <tr class="bg-secondary">
                            <th scope="row">{{$dataKelas->id}}</th>
                            <td>{{\App\Dosen::where('id',$dataKelas->id_dosen)->pluck('nama')->first()}}</td>
                            <td>{{\App\admin\Ruangan::where('id',$dataKelas->id_ruangan)->pluck('ruangan')->first()}}</td>
                            <td>{{\App\admin\Matakuliah::where('id',$dataKelas->id_matakuliah)->pluck('mataKuliah')->first()}}</td>
                            <td>{{$dataKelas->jamKuliah}}</td>
                            <td>
                                <a href="{{route('mahasiswa.kelas.detail',$dataKelas->id)}}" class="btn btn-success btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
        </div>
    </div>
@endsection
