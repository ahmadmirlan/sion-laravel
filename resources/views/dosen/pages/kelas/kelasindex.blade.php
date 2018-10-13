@extends('dosen.layouts.main')

@section('title')
    <title>Data Kelas</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Data Kelas</h4>

            <div class="card-body">

                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>ID Kelas</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Ruangan</th>
                        <th>Mata Kuliah</th>
                        <th>Jam Kuliah</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kelas as $kls)
                        <tr class="bg-secondary">
                            <th scope="row">{{$kls->id}}</th>
                            <td>{{\App\admin\KelasMahasiswaRelation::where('id_kelas',$kls->id)->count()}}</td>
                            <td>{{\App\admin\Ruangan::where('id',$kls->id_ruangan)->pluck('ruangan')->first()}}</td>
                            <td>{{\App\admin\Matakuliah::where('id',$kls->id_matakuliah)->pluck('mataKuliah')->first()}}</td>
                            <td>{{$kls->jamKuliah}}</td>
                            <td>
                                <a href="{{route('dosen.kelas.detail',$kls->id)}}" class="btn btn-success btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
