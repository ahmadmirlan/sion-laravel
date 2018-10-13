<?php
$getError = '';
if($errors->has('mataKuliah'))
    $getError = 'is-invalid';
?>
<div class="row">
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('mataKuliah','Matakuliah') !!}
            {!! Form::text('mataKuliah',null,['class' => 'form-control '.$getError,
                'id' => 'mataKuliah','placeholder' => 'Matakuliah']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('mataKuliah') }}</li>
                </ul>
            </div>
        </div>
    </div>

    {{--Form agama Start--}}
    <?php
    if($errors->has('bebanSks'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr class="d-md-none">

        <div class="form-group">
            {!! Form::label('bebanSks','Jumlah SKS') !!}
            {!! Form::select('bebanSks', ['1' => '1','2' => '2','3' => '3',
                            '4' => '4', '5' => '5','6' => '6'], null,
                 ['class' => 'form-control', 'data-provide' => 'selectpicker', 'name' => 'bebanSks']) !!}
            @if ($errors->has('bebanSks'))
                <ul class="parsley-errors-list filled" id="parsley-id-4">
                    <li class="parsley-required">{{ $errors->first('bebanSks') }}</li>
                </ul>
            @endif
        </div>
    </div>
    {{--Form agama End--}}

</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-danger" href="{{route('admin.matakuliah.index')}}">Kembali</a>
        </div>
    </div>
</div>