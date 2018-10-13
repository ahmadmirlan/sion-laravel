<?php
$getError = '';
if($errors->has('id_dosen'))
    $getError = 'is-invalid';
?>
<div class="row">
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('id_dosen','Dosen') !!}
            {!! Form::select('id_dosen', \App\Dosen::pluck('nama', 'id'), null,
                 ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'id_dosen']) !!}
            @if ($errors->has('id_dosen'))
                <ul class="parsley-errors-list filled" id="parsley-id-4">
                    <li class="parsley-required">{{ $errors->first('id_dosen') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <?php
    if($errors->has('id_matakuliah'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('id_matakuliah','Matakuliah') !!}
            {!! Form::select('id_matakuliah', \App\admin\Matakuliah::pluck('mataKuliah', 'id'), null,
                 ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'id_matakuliah']) !!}
            @if ($errors->has('id_matakuliah'))
                <ul class="parsley-errors-list filled" id="parsley-id-4">
                    <li class="parsley-required">{{ $errors->first('id_matakuliah') }}</li>
                </ul>
            @endif
        </div>
    </div>

    {{--Form tanggal lahir Start--}}
    <?php
    if($errors->has('id_ruangan'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('id_ruangan','Ruangan') !!}
            {!! Form::select('id_ruangan', \App\admin\Ruangan::pluck('ruangan', 'id'), null,
                 ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'id_ruangan']) !!}
            @if ($errors->has('id_ruangan'))
                <ul class="parsley-errors-list filled" id="parsley-id-4">
                    <li class="parsley-required">{{ $errors->first('id_ruangan') }}</li>
                </ul>
            @endif
        </div>
    </div>
    {{--Form tanggal lahir END--}}


    {{--Form Jam Kuliah Start--}}
    <?php
    if($errors->has('jamKuliah'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>

    <div class="col-md-4">
        <hr>
        <div class="form-group">
            {!! Form::label('jamKuliah','Jam Kuliah') !!}
            {!! Form::text('jamKuliah',null,['class' => 'form-control '.$getError,
                'id' => 'jamKuliah','data-provide' => 'clockpicker','data-autoclose' => 'true',
                'data-placement' => 'top','data-align' => 'bottom','readonly',
                ]) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('jamKuliah') }}</li>
                </ul>
            </div>
        </div>
    </div>
    {{--Form Jam Kuliah END--}}


    {{--Form Jam Selesai Kuliah Start--}}
    <?php
    if($errors->has('jamSelesaiKuliah'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>

    <div class="col-md-4">
        <hr>
        <div class="form-group">
            {!! Form::label('jamSelesaiKuliah','Jam Selesai Kuliah') !!}
            {!! Form::text('jamSelesaiKuliah',null,['class' => 'form-control '.$getError,
                'id' => 'jamSelesaiKuliah','data-provide' => 'clockpicker','data-autoclose' => 'true',
                'data-placement' => 'top','data-align' => 'bottom','readonly',
                ]) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('jamSelesaiKuliah') }}</li>
                </ul>
            </div>
        </div>
    </div>
    {{--Form Jam Kuliah END--}}

    {{--Form Hari Perkuliahan Start--}}
    <?php
    if($errors->has('hariPerkuliahan'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr>
        <div class="form-group">
            {!! Form::label('hariPerkuliahan','Hari Perkuliahan') !!}
            {!! Form::select('hariPerkuliahan', ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu'
            , 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu','Sunday' => 'Minggu'], null,
                 ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'hariPerkuliahan']) !!}
            @if ($errors->has('hariPerkuliahan'))
                <ul class="parsley-errors-list filled" id="parsley-id-4">
                    <li class="parsley-required">{{ $errors->first('hariPerkuliahan') }}</li>
                </ul>
            @endif
        </div>
    </div>
    {{--Form Hari Perkuliahan END--}}

</div>

<div class="row">
    <hr>
    <div class="col-md-4">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-danger" href="{{route('admin.kelas.index')}}">Kembali</a>
        </div>
    </div>
</div>