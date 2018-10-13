<?php
$getError = '';
if($errors->has('ruangan'))
    $getError = 'is-invalid';
?>
<div class="row">
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('ruangan','Ruangan') !!}
            {!! Form::text('ruangan',null,['class' => 'form-control '.$getError,
                'id' => 'ruangan','placeholder' => 'ruangan']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('ruangan') }}</li>
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
            <a class="btn btn-danger" href="{{route('admin.ruangan.index')}}">Kembali</a>
        </div>
    </div>
</div>