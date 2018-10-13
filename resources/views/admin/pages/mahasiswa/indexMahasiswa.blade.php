@extends('admin.layouts.main')

@section('title')
    <title>Data Mahasiswa</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Data Mahasiswa</h4>
            <div class="card-body">
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <a href="{{route('admin.mahasiswa.create')}}" class="btn btn-outline btn-success">Tambah Data</a>
                    </div>
                    <div class="col-xl-6">
                        <div class="text-right">
                            <!-- Default -->
                            <form class="lookup lookup-right" action="tampil">
                                <input type="text" id="search" name="search" placeholder="Cari...">
                            </form>
                        </div>
                    </div>
                </div>


                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Program Studi</th>
                        <th>Agama</th>
                        <th>Kode RFID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($_GET['search']))
                        <?php
                        $searchMahasiswa = \Illuminate\Support\Facades\DB::table('mahasiswas')
                            ->where('nama','like','%'.$_GET['search'].'%')
                            ->get();
                        ?>

                        @foreach($searchMahasiswa as $mhs)
                            <tr class="bg-secondary">
                                <th scope="row">{{$mhs->nim}}</th>
                                <td>{{$mhs->nama}}</td>
                                <td>{{$mhs->tanggalLahir}}</td>
                                <td>{{\App\admin\Jurusan::where('id',$mhs->jurusan_id)->pluck('jurusan')->first()}}</td>
                                <td>{{\App\admin\Agama::where('id',$mhs->agama_id)->pluck('agama')->first()}}</td>
                                <td>{{$mhs->kode_rfid}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'
                                                            =>['admin.mahasiswa.destroy', $mhs->id] ]) !!}
                                    <a href="{{route('admin.mahasiswa.edit',$mhs->id)}}" class="btn btn-primary btn-sm">Update</a>
                                    <button id="delete"
                                            onclick="return confirm('Lanjutkan Menghapus?')"
                                            type="submit"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                    @else
                        @foreach($mahasiswa as $mhs)
                            <tr class="bg-secondary">
                                <th scope="row">{{$mhs->nim}}</th>
                                <td>{{$mhs->nama}}</td>
                                <td>{{$mhs->tanggalLahir}}</td>
                                <td>{{\App\admin\Jurusan::where('id',$mhs->jurusan_id)->pluck('jurusan')->first()}}</td>
                                <td>{{\App\admin\Agama::where('id',$mhs->agama_id)->pluck('agama')->first()}}</td>
                                <td>{{$mhs->kode_rfid}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'
                                                            =>['admin.mahasiswa.destroy', $mhs->id] ]) !!}
                                    <a href="{{route('admin.mahasiswa.edit',$mhs->id)}}" class="btn btn-primary btn-sm">Update</a>
                                    <button id="delete"
                                            onclick="return confirm('Lanjutkan Menghapus?')"
                                            type="submit"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($_GET['search']))
                    @if($searchMahasiswa->count() < 1)
                        <div class="col-xl-12">
                            <div class="text-center">
                                <blockquote class="blockquote">Data Pencarian Tidak Di Temukan</blockquote>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection