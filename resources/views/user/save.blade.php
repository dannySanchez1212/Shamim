@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User - Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
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
                        
                        <div class="form-group row">
                            <label for="owner_user_id" class="col-md-4 col-form-label text-md-right">{{ __('Company User') }}</label>
                            <div class="col-md-6">
                                <SELECT id='owner_user_id' name='owner_user_id' class="form-control" >
                                    @foreach($companys_users as $company_user)
                                        <option id='owner_user_id' value="{{ $company_user }}" selected="selected" class="form-control{{ $errors->has('owner_user_id') ? ' is-invalid' : '' }}" required autofocus>{{ $company_user }}</option>
                                    @endforeach
                                </SELECT>
                                 @if ($errors->has('owner_user_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('owner_user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="package_id" class="col-md-4 col-form-label text-md-right">{{ __('Package') }}</label>
                            <div class="col-md-6">
                                <SELECT id='package_id' name='package_id' class="form-control" >
                                    @foreach($packages as $package)
                                        <option id='package_id' value="{{ $package }}" selected="selected" class="form-control{{ $errors->has('package_id') ? ' is-invalid' : '' }}" required autofocus>{{ $package }}</option>
                                    @endforeach
                                </SELECT>
                                 @if ($errors->has('package_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('package_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_type_id" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                            <div class="col-md-6">
                                <SELECT id='user_type_id' name='user_type_id' class="form-control" >
                                    @foreach($users_types as $user_type)
                                        <option id='user_type_id' value="{{ $user_type }}" selected="selected" class="form-control{{ $errors->has('user_type_id') ? ' is-invalid' : '' }}" required autofocus>{{ $user_type }}</option>
                                    @endforeach
                                </SELECT>
                                 @if ($errors->has('user_type_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user_type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                 @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                            <div class="col-md-6">
                                <SELECT id='location_id' name='location_id' class="form-control" >
                                    @foreach($locations as $location)
                                        <option id='location_id' value="{{ $location }}" selected="selected" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" required autofocus>{{ $location }}</option>
                                    @endforeach
                                </SELECT>
                                 @if ($errors->has('location_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('location_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="map" class="col-md-4 col-form-label text-md-right">{{ __('Map') }}</label> 
                            <div class="col-md-6">
                                <input id="map" type="text" class="form-control{{ $errors->has('map') ? ' is-invalid' : '' }}" name="map" value="{{ old('map') }}" required>
                                @if ($errors->has('map'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('map') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activation_date" class="col-md-4 col-form-label text-md-right">{{ __('Activation date') }}</label>
                            <div class="col-md-6">
                                <input id="activation_date" type="date" class="form-control{{ $errors->has('activation_date') ? ' is-invalid' : '' }}" name="activation_date" value="{{ old('activation_date') }}" required>
                                @if ($errors->has('activation_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('activation_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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


