@extends('layouts.admin_lte_login')

@section('content')
    <form action="{{ route('login') }}-user" method="post">
    {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('username'))
            <span class="invalid-feedback help-block" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
        
      </div>
      <div class="form-group has-feedback">

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="invalid-feedback help-block" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-block btn-primary">Accesar</button>
        </div>
      </div>
    </form>
@endsection
