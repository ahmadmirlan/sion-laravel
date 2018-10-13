@extends('layouts.main')

@section('title')
    <title>Home Page</title>
@endsection

@section('main_content')
    <!-- Main container -->
    <main>

        <div class="main-content">
            <div class="row">

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Mahasiswa</strong></h5>
                        </div>

                        <div class="card card-body">
                            <a href="{{route('admin.mahasiswa.index')}}">
                                <div class="flexbox">
                                    <span class="ti-user fs-40"></span>
                                    <span class="fs-40 fw-100">{{\App\Mahasiswa::all()->count()}}</span>
                                </div>
                                <div class="text-right">Mahasiswa</div>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Dosen</strong></h5>
                        </div>

                        <div class="card card-body">
                            <a href="{{route('admin.dosen.index')}}">
                                <div class="flexbox">
                                    <span class="ti-id-badge fs-40"></span>
                                    <span class="fs-40 fw-100">{{\App\Dosen::all()->count()}}</span>
                                </div>
                                <div class="text-right">Dosen</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Kelas</strong></h5>
                        </div>

                        <div class="card card-body">
                            <a href="{{route('admin.kelas.index')}}">
                                <div class="flexbox">
                                    <span class="ti-blackboard fs-40"></span>
                                    <span class="fs-40 fw-100">{{\App\admin\Kelas::all()->count()}}</span>
                                </div>
                                <div class="text-right">Kelas</div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>ID Kelas</th>
                        <th>Dosen</th>
                        <th>Ruangan</th>
                        <th>Mata Kuliah</th>
                        <th>Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataKelas as $kls)
                        <tr class="bg-secondary">
                            <th scope="row">{{$kls->id}}</th>
                            <td>{{\App\Dosen::where('id',$kls->id_dosen)->pluck('nama')->first()}}</td>
                            <td>{{\App\admin\Ruangan::where('id',$kls->id_ruangan)->pluck('ruangan')->first()}}</td>
                            <td>{{\App\admin\Matakuliah::where('id',$kls->id_matakuliah)->pluck('mataKuliah')->first()}}</td>
                            <td>
                                <a href="{{route('admin.kelas.view',$kls->id)}}" class="btn btn-success btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--/.main-content -->
    </main>
@endsection