<?php
$getError = '';
if($errors->has('nim'))
    $getError = 'is-invalid';
?>
<div class="row">
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('nim','NIM') !!}
            {!! Form::number('nim',null,['class' => 'form-control '.$getError,
                'id' => 'nim','placeholder' => 'NIM Mahasiswa']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('nim') }}</li>
                </ul>
            </div>
        </div>
    </div>

    <?php
    if($errors->has('nama'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('nama','Nama Mahasiswa') !!}
            {!! Form::text('nama',null,['class' => 'form-control '.$getError,
                'id' => 'nama','placeholder' => 'Nama Mahasiswa']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('nama') }}</li>
                </ul>
            </div>

        </div>
    </div>

    {{--Form tanggal lahir Start--}}
    <?php
    if($errors->has('tanggalLahir'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('tanggalLahir','Tanggal Lahir') !!}
            {!! Form::text('tanggalLahir',null,['class' => 'form-control '.$getError,
                'id' => 'tanggalLahir','data-provide' => 'datepicker',
                'data-date-today-highlight' => 'true','readonly',
                'value' => '07/07/2017']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('tanggalLahir') }}</li>
                </ul>
            </div>
        </div>
    </div>
    {{--Form tanggal lahir END--}}

    {{--Form jurusan Start--}}
    <?php
    if($errors->has('jurusan_id'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr>

        <div class="form-group">
            {!! Form::label('jurusan_id','Prodi') !!}
            {!! Form::select('jurusan_id', \App\admin\Jurusan::pluck('jurusan', 'id'), null,
                 ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'jurusan_id']) !!}
            @if ($errors->has('jurusan_id'))
                <ul class="parsley-errors-list filled" id="parsley-id-4">
                    <li class="parsley-required">{{ $errors->first('jurusan_id') }}</li>
                </ul>
            @endif
        </div>
    </div>
    {{--Form Jurusan End--}}

    {{--Form agama Start--}}
    <?php
    if($errors->has('agama_id'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr>

        <div class="form-group">
            {!! Form::label('agama_id','Agama') !!}
            {!! Form::select('agama_id', \App\admin\Agama::pluck('agama', 'id'), null,
                 ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'agama_id']) !!}
            @if ($errors->has('agama_id'))
                <ul class="parsley-errors-list filled" id="parsley-id-4">
                    <li class="parsley-required">{{ $errors->first('agama_id') }}</li>
                </ul>
            @endif
        </div>
    </div>
    {{--Form agama End--}}

    <?php
    if($errors->has('kode_rfid'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr>
        <div class="form-group">
            {!! Form::label('kode_rfid','Kode RFID') !!}
            {!! Form::text('kode_rfid',null,['class' => 'form-control '.$getError,
                'id' => 'kode_rfid','placeholder' => 'Kode RFID']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('kode_rfid') }}</li>
                </ul>
            </div>

        </div>
    </div>


    <?php
    if($errors->has('email'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',null,['class' => 'form-control '.$getError,
                'id' => 'email','placeholder' => 'Email']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('email') }}</li>
                </ul>
            </div>
        </div>
    </div>

    @if(!(isset($mahasiswa)))
        <input readonly type="hidden" id="password" name="password" value="$2y$10$vwIEsFIe2GCcBdTlC2Yvx.ayWA5eIvWMEOKvdGGbjPN/ft667zTaC">
    @endif

</div>

<div class="row">
    <hr>
    <div class="col-md-4">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-danger" href="{{route('admin.mahasiswa.index')}}">Kembali</a>
        </div>
    </div>
</div>