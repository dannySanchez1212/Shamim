@extends('layouts.app')

@section('content')
<main class="py-4">
    @include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Owner - Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('addO')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company name') }}</label>
                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" required autofocus>
                                 @if ($errors->has('company'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Company logo') }}</label>
                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" required>
                                @if ($errors->has('file'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('file') }}</strong>
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
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" pattern="[0-9]{10}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line1" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address_line1" type="text" class="form-control{{ $errors->has('address_line1') ? ' is-invalid' : '' }}" name="address_line1" value="{{ old('address_line1') }}" required>
                                @if ($errors->has('address_line1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line2" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address_line2" type="text" class="form-control{{ $errors->has('address_line2') ? ' is-invalid' : '' }}" name="address_line2" value="{{ old('address_line2') }}">
                                @if ($errors->has('address_line2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                            <!-- Country -->
                         

                        

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">

                              <SELECT Value="country" id="country" name="country" class="form-control input-lg dynamic" data-dependent="state">
                                  <option value="country" id="country" selected="selected" class="{{$errors->has('country') ? ' is-invalid' : '' }}" >Select Country</option>
                                  @foreach($Countrys as $Country)
                                  <option value="{{ $Country }}" id="country" selected="selected" class="{{$errors->has('country') ? ' is-invalid' : '' }}" required autofocus>{{ $Country }}</option>
                                  @endforeach
                              </SELECT>                                
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <!-- state -->

                         <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                            <div class="col-md-6">

                              <SELECT Value="state" id="state" name="state" class="form-control input-lg dynamic" data-dependent="city">
                                  <option value="state" id="state" selected="selected" class="{{$errors->has('state') ? ' is-invalid' : '' }}" >Select State</option>
                                  
                              </SELECT>                                
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <!-- Citi-->

                          <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                            <div class="col-md-6">

                              <SELECT Value="city" id="city" name="city" class="form-control input-lg dynamic" >
                                  <option value="city" id="city" selected="selected" class="{{$errors->has('city') ? ' is-invalid' : '' }}" >Select State</option>
                                  
                              </SELECT>                                
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        

                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip') }}</label>
                            <div class="col-md-6">
                                <input id="zip" type="text" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ old('zip') }}" required>
                                @if ($errors->has('zip'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('zip') }}</strong>
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

@section('scripts')
<script src="/js/Countries/edit.js"></script>
@endsection


