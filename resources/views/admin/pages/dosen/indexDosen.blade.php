@extends('admin.layouts.main')

@section('title')
    <title>Data Dosen</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Data Dosen</h4>
            <div class="card-body">
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <a href="{{route('admin.dosen.create')}}" class="btn btn-outline btn-success">Tambah Data</a>
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
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>RFID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($_GET['search']))
                        <?php
                        $searchDosen = \Illuminate\Support\Facades\DB::table('dosens')
                            ->where('nama','like','%'.$_GET['search'].'%')
                            ->get();
                        ?>

                        @foreach($searchDosen as $dsn)
                            <tr class="bg-secondary">
                                <th scope="row">{{$dsn->nip}}</th>
                                <td>{{$dsn->nama}}</td>
                                <td>{{$dsn->tanggalLahir}}</td>
                                <td>{{\App\admin\Agama::where('id',$dsn->agama_id)->pluck('agama')->first()}}</td>
                                <td>{{$dsn->rfid}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'
                                                            =>['admin.dosen.destroy', $dsn->id] ]) !!}
                                    <a href="{{route('admin.dosen.edit',$dsn->id)}}" class="btn btn-primary btn-sm">Update</a>
                                    <button id="delete"
                                            onclick="return confirm('Lanjutkan Menghapus?')"
                                            type="submit"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                    @else
                        @foreach($dosen as $dsn)
                            <tr class="bg-secondary">
                                <th scope="row">{{$dsn->nip}}</th>
                                <td>{{$dsn->nama}}</td>
                                <td>{{$dsn->tanggalLahir}}</td>
                                <td>{{\App\admin\Agama::where('id',$dsn->agama_id)->pluck('agama')->first()}}</td>
                                <td>{{$dsn->rfid}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'
                                                            =>['admin.dosen.destroy', $dsn->id] ]) !!}
                                    <a href="{{route('admin.dosen.edit',$dsn->id)}}" class="btn btn-primary btn-sm">Update</a>
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
                    @if($searchDosen->count() < 1)
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