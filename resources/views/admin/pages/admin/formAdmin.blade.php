<?php
$getError = '';
if($errors->has('nip'))
    $getError = 'is-invalid';
?>
<div class="row">

    <?php
    if($errors->has('name'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr class="d-md-none">
        <div class="form-group">
            {!! Form::label('name','Nama Admin') !!}
            {!! Form::text('name',null,['class' => 'form-control '.$getError,
                'id' => 'name','placeholder' => 'Nama Admin']) !!}
            <div class="invalid-feedback">
                <ul class="list-unstyled">
                    <li>{{ $errors->first('name') }}</li>
                </ul>
            </div>
        </div>
    </div>

    {{--Form tanggal lahir Start--}}

    {{--Form Email Start--}}
    <?php
    if($errors->has('email'))
        $getError = 'is-invalid';
    else
        $getError = '';
    ?>
    <div class="col-md-4">
        <hr class="d-md-none">
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

    @if(!(isset($admin)))
        <input readonly type="hidden" id="password" name="password" value="$2y$10$fLcxIOm2a1KWJKPrKuArU.GhCyrjRn7GVmL2Etk7KYHl9AJlN7BTa">
    @endif

</div>

<div class="row">
    <hr>
    <div class="col-md-4">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-danger" href="{{route('admin.user.index')}}">Kembali</a>
        </div>
    </div>
</div>