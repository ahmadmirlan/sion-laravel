@extends('dosen.layouts.main')

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
                        <th>Nama Mahasiswa</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($mahasiswa as $mhs)
                        <tr class="bg-secondary">
                            <td>{{$mhs->nama}}</td>
                            <td>{{$mhs->P1}}</td>
                            <td>{{$mhs->P2}}</td>
                            <td>{{$mhs->P3}}</td>
                            <td>{{$mhs->P4}}</td>
                            <td>{{$mhs->P5}}</td>
                            <td>{{$mhs->P6}}</td>
                            <td>{{$mhs->P7}}</td>
                            <td>{{$mhs->P8}}</td>
                            <td>{{$mhs->P9}}</td>
                            <td>{{$mhs->P10}}</td>
                            <td>{{$mhs->P11}}</td>
                            <td>{{$mhs->P12}}</td>
                            <td>{{$mhs->P13}}</td>
                            <td>{{$mhs->P14}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($mahasiswa->count() != 0)
                    {!! Form::open(array('route' => 'dosen.kelas.editKehadiran')) !!}
                    {{ csrf_field() }}

                    <input readonly type="hidden" id="id_kelas" name="id_kelas" value="{{$kelas->id}}">
                    <div class="row">
                        <div class="col-md-2">
                            <hr class="d-md-none">
                            <div class="form-group">
                                {!! Form::select('pertemuan', ['P1' => 'Pertemuan 1', 'P2' => 'Pertemuan 2', 'P3' => 'Pertemuan 3',
                                    'P4' => 'Pertemuan 4','P5' => 'Pertemuan 5','P6' => 'Pertemuan 6','P7' => 'Pertemuan 7'
                                    ,'P8' => 'Pertemuan 8','P9' => 'Pertemuan 9','P10' => 'Pertemuan 10','P11' => 'Pertemuan 11'
                                    ,'P12' => 'Pertemuan 12','P13' => 'Pertemuan 13','P14' => 'Pertemuan 14'], '',
                                ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'pertemuan']) !!}
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Edit Kehadiran</button>
                    <a href="{{route('dosen.kelas.index')}}" class="btn btn-danger">Back</a>
                    {!! Form::close() !!}
                @else
                    <div class="col-xl-12">
                        <div class="text-center">
                            <blockquote class="blockquote">Belum Ada Mahasiswa Yang Terdaftar Dalam Kelas Ini</blockquote>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
