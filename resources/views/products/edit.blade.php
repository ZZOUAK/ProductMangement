@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8" id="test">
            <div class="card">
                <div class="card-header">
                    <h5 class=" row justify-content-center">update Product  <span class="badge badge-secondary">{{$product->name}}</span></h5>
                </div>




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


                <form method="POST" action="{{ route('updateProduct',$product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row" id="familleDiv">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                        <div class="col-md-6">
                            <input id="name" disabled v-model="message" type="text" class="form-control @error('name') is-invalid @enderror" name="name"   value="{{ $product->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="groupeDiv">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text"  class="form-control @error('description') is-invalid @enderror" name="description"  value="{{ $product->description }}" required autocomplete="description" autofocus>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="sousGroupeDiv">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"  value="{{ $product->price }}" required autocomplete="price" autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="lotDiv">
                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>

                        <div class="col-md-6">
                            <img width="48px" height="48px" src="{{asset('storage/'.$product->image.'')}}" alt="Product image">
                            <input id="image" type="file"  name="image"   required  autofocus>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row" id="pvpDiv">
                        <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                        <div class="col-md-6">
                            <input id="Category" type="text"  class="form-control @error('Category') is-invalid @enderror" name="Category"  value="{{ $category->name }}" required autocomplete="Category" autofocus>

                            @error('Category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>








                    <div class="form-group row mb-0" id="buttonDiv">
                        <div class="col-md-6 offset-md-6">
                            <button type="submit" :disabled="casee" class="btn btn-primary" >
                                {{ __('update') }}
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
