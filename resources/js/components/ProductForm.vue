<script>
export default {
    name : 'new_product',
    data() {
        return {
             product:[
                {name : ''},
               {desciption : ''},
               {price : ''},
               {category : ''}]

        }
    },
    methods: {
        isValid() {
            return this.product.name !== '' && this.product.decription !== '' && this.product.price !=='' && this.product.category!=='';
          }
    }
}
</script>
<template>
    <div>
        <main class="py-4" id="app">
    <div class="new_product">a
        <div class="col-md-8" id="test">
            <div class="card">
                <div class="card-header">Add Product @{{ProductApp.name}}<span class="badge badge-secondary"></span></div>




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
                            <input id="name" v-bind:product.name="ProductApp.name" v-model="ProductApp.name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"   value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <textarea id="description"  v-bind:product.description="ProductApp.description" v-model="ProductApp.description" class="form-control @error('description') is-invalid @enderror" name="description"  value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

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
                            <input id="price" type="number" v-bind:product.price="ProductApp.price" v-model="ProductApp.price" class="form-control @error('price') is-invalid @enderror" name="price"  value="{{ old('price') }}" required autocomplete="price" autofocus>

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
                            <input id="Category" type="text" v-bind:product.category="ProductApp.category" v-model="ProductApp.category"  class="form-control @error('Category') is-invalid @enderror" name="Category"  value="{{ old('Category') }}" required autocomplete="Category" autofocus>

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
                <div class="row justify-content-center">

                    <div class="col-md-2">
                        <div class="form-group row mb-0" id="buttonDivNotFormSubmit">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" :disabled="!isValid"  class="btn btn-primary" >
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                </div>
            </div>

        </div>
    </div></main>
    </div>
</template>



