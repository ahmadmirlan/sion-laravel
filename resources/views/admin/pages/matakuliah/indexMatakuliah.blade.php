@extends('admin.layouts.main')

@section('title')
    <title>Data Mata Kuliah</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Data Mata Kuliah</h4>
            <div class="card-body">
                <div class="row gap-y">
                    <div class="col-xl-6">
                        <a href="{{route('admin.matakuliah.create')}}" class="btn btn-outline btn-success">Tambah Data</a>
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
                        <th>ID</th>
                        <th>Matakuliah</th>
                        <th>Beban SKS</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($_GET['search']))
                        <?php
                        $searchMatkul = \Illuminate\Support\Facades\DB::table('matakuliah')
                            ->where('mataKuliah','like','%'.$_GET['search'].'%')
                            ->get();
                        ?>

                        @foreach($searchMatkul as $matkul)
                            <tr class="bg-secondary">
                                <th scope="row">{{$matkul->id}}</th>
                                <td>{{$matkul->mataKuliah}}</td>
                                <td>{{$matkul->bebanSks}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'
                                                            =>['admin.matakuliah.destroy', $matkul->id] ]) !!}
                                    <a href="{{route('admin.matakuliah.edit',$matkul->id)}}" class="btn btn-primary btn-sm">Update</a>
                                    <button id="delete"
                                            onclick="return confirm('Lanjutkan Menghapus?')"
                                            type="submit"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                    @else
                        @foreach($matakuliah as $matkul)
                            <tr class="bg-secondary">
                                <th scope="row">{{$matkul->id}}</th>
                                <td>{{$matkul->mataKuliah}}</td>
                                <td>{{$matkul->bebanSks}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'
                                                            =>['admin.matakuliah.destroy', $matkul->id] ]) !!}
                                    <a href="{{route('admin.matakuliah.edit',$matkul->id)}}" class="btn btn-primary btn-sm">Update</a>
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
                    @if($searchMatkul->count() < 1)
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