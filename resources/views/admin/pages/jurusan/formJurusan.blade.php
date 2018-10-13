<?php
$getError = '';
if($errors->has('jurusan'))
    $getError = 'is-invalid';
?>
<div class="row">
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('jurusan','Program Studi') !!}
            {!! Form::text('jurusan',null,['class' => 'form-control '.$getError,
                'id' => 'jurusan','placeholder' => 'Prodi']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('jurusan') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <hr>
    <div class="col-md-4">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-danger" href="{{route('admin.prodi.index')}}">Kembali</a>
        </div>
    </div>
</div>