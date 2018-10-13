@extends('mahasiswa.layouts.main')

@section('title')
    <title>Detail Kehadiran</title>
@endsection

@section('main_content')
    <div class="main-content">
        <div class="card">
            <h4 class="card-title">Detail Kehadiran</h4>
            <div class="card-body">

                <table class="table table-lg table-separated">
                    <thead>
                    <tr class="bg bg-primary">
                        <th>Matakuliah</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3</th>
                        <th>P4</th>
                        <th>P5</th>
                        <th>P6</th>
                        <th>P7</th>
                        <th>P8</th>
                        <th>P9</th>
                        <th>P10</th>
                        <th>P11</th>
                        <th>P12</th>
                        <th>P13</th>
                        <th>P14</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kehadiran as $khr)
                        <tr class="bg-secondary">
                            <th scope="row">{{\App\admin\Matakuliah::where('id',$khr->id_matakuliah)->pluck('matakuliah')->first()}}</th>
                            <td>{{$khr->P1}}</td>
                            <td>{{$khr->P2}}</td>
                            <td>{{$khr->P3}}</td>
                            <td>{{$khr->P4}}</td>
                            <td>{{$khr->P5}}</td>
                            <td>{{$khr->P6}}</td>
                            <td>{{$khr->P7}}</td>
                            <td>{{$khr->P8}}</td>
                            <td>{{$khr->P9}}</td>
                            <td>{{$khr->P10}}</td>
                            <td>{{$khr->P11}}</td>
                            <td>{{$khr->P12}}</td>
                            <td>{{$khr->P13}}</td>
                            <td>{{$khr->P14}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection