<?php
$getError = '';
if($errors->has('nip'))
    $getError = 'is-invalid';
?>
<div class="row">
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('nip','NIP') !!}
            {!! Form::number('nip',null,['class' => 'form-control '.$getError,
                'id' => 'nip','placeholder' => 'NIP Dosen']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('nip') }}</li>
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
            {!! Form::label('nama','Nama Dosen') !!}
            {!! Form::text('nama',null,['class' => 'form-control '.$getError,
                'id' => 'nama','placeholder' => 'Nama Dosen']) !!}
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

    {{--Form Email Start--}}
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
            {!! Form::email('email',null,['class' => 'form-control '.$getError,
                'id' => 'email','placeholder' => 'Email']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('email') }}</li>
                </ul>
            </div>

        </div>
    </div>
    {{--Form Email End--}}


    {{--Form Email Start--}}
    <?php
    if($errors->has('rfid'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr>
        <div class="form-group">
            {!! Form::label('rfid','RFID') !!}
            {!! Form::text('rfid',null,['class' => 'form-control '.$getError,
                'id' => 'rfid','placeholder' => 'RFID']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('rfid') }}</li>
                </ul>
            </div>

        </div>
    </div>
    {{--Form Email End--}}

    @if(!(isset($dosen)))
        <input readonly type="hidden" id="password" name="password" value="$2y$10$VVLKajRHGCqPFrpO6E5QXObTEZnGl8IzGylg1g2wh7ml2lJIMekRW">
    @endif

</div>

<div class="row">
    <hr>
    <div class="col-md-4">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-danger" href="{{route('admin.dosen.index')}}">Kembali</a>
        </div>
    </div>
</div>