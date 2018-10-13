<?php
$getError = '';
if($errors->has('agama'))
    $getError = 'is-invalid';
?>
<div class="row">
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('agama','Agama') !!}
            {!! Form::text('agama',null,['class' => 'form-control '.$getError,
                'id' => 'agama','placeholder' => 'Agama']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('agama') }}</li>
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
            <a class="btn btn-danger" href="{{route('admin.agama.index')}}">Kembali</a>
        </div>
    </div>
</div>