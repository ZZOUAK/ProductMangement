@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="col-md-12" id="test">
            <div class="card">
                <div class="card-header">
                <h5 class=" row justify-content-center">Add Product <span class="badge badge-secondary">  @{{product.name}}</span></h5>
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


                <form method="POST" action="{{ route('createProduct') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group row" id="familleDiv">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                        <div class="col-md-6">
                            <input id="name" v-model="product.name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"   value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <textarea id="description"  v-model="product.description" class="form-control @error('description') is-invalid @enderror" name="description"  value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

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
                            <input id="price" type="number" step="0.01" v-model="product.price" class="form-control @error('price') is-invalid @enderror" name="price"  value="{{ old('price') }}" required autocomplete="price" autofocus>

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
                            <input id="Category" type="text" v-model="product.category"  class="form-control @error('Category') is-invalid @enderror" name="Category"  value="{{ old('Category') }}" required autocomplete="Category" autofocus>

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
                                {{ __('Add') }}
                            </button>
                        </div>
                    </div>
                </form>



                </div>
            </div>

        </div>
    </div>


{{-- <new_product

    v-bind:product="productApp"></new_product> --}}
@endsection
