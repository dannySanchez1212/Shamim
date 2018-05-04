@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Package - Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('package.store') }}">
                        @csrf

                        <!-- Name Package -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Package name ') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Name Company -->
                        <div class="form-group row">
                            <label for="owner_id" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>
                            <div class="col-md-6">
                                <SELECT id='owner_id' name='owner_id' class="form-control" >
                                    @foreach($companys as $company)
                                        <option id='owner_id' value="{{ $company }}" selected="selected" class="form-control{{ $errors->has('owner_id') ? ' is-invalid' : '' }}" required autofocus>{{ $company }}</option>
                                    @endforeach
                                </SELECT>
                                @if ($errors->has('owner_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('owner_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- User Group -->
                        <div class="form-group row">
                            <label for="user_group" class="col-md-4 col-form-label text-md-right">{{ __('User Group') }}</label>
                            <div class="col-md-6">
                                <input id="user_group" type="text" class="form-control{{ $errors->has('user_group') ? ' is-invalid' : '' }}" name="user_group" value="{{ old('user_group') }}" required>
                                @if ($errors->has('user_group'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
