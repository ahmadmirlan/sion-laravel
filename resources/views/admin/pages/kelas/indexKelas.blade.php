@extends('admin.layouts.main')

@section('title')
    <title>Data Kelas</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Data Kelas</h4>
            <div class="card-body">
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <a href="{{route('admin.kelas.create')}}" class="btn btn-outline btn-success">Tambah Data</a>
                    </div>
                </div>


                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>ID Kelas</th>
                        <th>Dosen</th>
                        <th>Ruangan</th>
                        <th>Mata Kuliah</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kelas as $kls)
                        <tr class="bg-secondary">
                            <th scope="row">{{$kls->id}}</th>
                            <td>{{\App\Dosen::where('id',$kls->id_dosen)->pluck('nama')->first()}}</td>
                            <td>{{\App\admin\Ruangan::where('id',$kls->id_ruangan)->pluck('ruangan')->first()}}</td>
                            <td>{{\App\admin\Matakuliah::where('id',$kls->id_matakuliah)->pluck('mataKuliah')->first()}}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route'
                                                        =>['admin.kelas.destroy', $kls->id] ]) !!}
                                <a href="{{route('admin.kelas.edit',$kls->id)}}" class="btn btn-primary btn-sm">Update</a>
                                <a href="{{route('admin.kelas.view',$kls->id)}}" class="btn btn-success btn-sm">Detail</a>
                                <button id="delete"
                                        onclick="return confirm('Lanjutkan Menghapus?')"
                                        type="submit"
                                        class="btn btn-danger btn-sm">Hapus</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection