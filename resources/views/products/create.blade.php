@extends('layouts.app');

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8" id='hgj'>
            <div class="card">
                <div class="card-header">Add Product @{{message}}<span class="badge badge-secondary"></span></div>




                <div class="card-body">


                    <div class="alert alert-success" role="alert" id="articleMsg" style="display:none;">

                    </div>
                    <div class="alert alert-danger" role="alert" id="articleMsgBad" style="display:none;">

                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('statusBad'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('statusBad') }}
                        </div>
                    @endif


                <form method="POST" action="{{ route('createProduct') }}">
                    @csrf


                    <div class="form-group row" id="familleDiv">
                        <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('firstname') }}</label>

                        <div class="col-md-6">
                            <input id="firstname" v-model="info.push" @click="clear(0)" @keyUp="enable"  type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"   value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="groupeDiv">
                        <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('lastname') }}</label>

                        <div class="col-md-6">
                            <input id="lastname" type="text" v-model="info[1]" @click="clear(1)" @keyUp="enable" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="sousGroupeDiv">
                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                        <div class="col-md-6">
                            <input id="city" type="text" v-model="info[2]" @click="clear(2)" @keyUp="enable" class="form-control @error('city') is-invalid @enderror" name="city"  value="{{ old('city') }}" required autocomplete="city" autofocus>

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="lotDiv">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" v-model="info[3]" @click="clear(3)" @keyUp="enable" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="pvpDiv">
                        <label for="Company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                        <div class="col-md-6">
                            <input id="Company" type="text" v-model="info[4]" @click="clear(4)" @keyUp="enable" class="form-control @error('Company') is-invalid @enderror" name="Company"  value="{{ old('Company') }}" required autocomplete="Company" autofocus>

                            @error('Company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row"id="quantiteDiv">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email"  type="email" v-model="info[5]" @click="clear(5)" @keyUp="enable" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>







                    <div class="form-group row mb-0" id="buttonDiv">
                        <div class="col-md-6 offset-md-6">
                            <button type="submit" :disabled="casee" class="btn btn-primary" >
                                {{ __('Envoyer') }}
                            </button>
                        </div>
                    </div>
                </form>
                {{-- <div class="row justify-content-center">

                    <div class="col-md-2">
                        <div class="form-group row mb-0" id="buttonDivNotFormSubmit">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"  class="btn btn-primary" >
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}


                </div>
            </div>

        </div>

    </div>
</div>
@endsection
