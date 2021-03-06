@extends('layouts.app')

@section('content')

<div class="container">
  <div class="notification">
   <h4> <div class="row justify-content-center">List of products.</div></h4>
    <ul>
        {{-- laravel blade code --}}
        {{-- @foreach ($products as $product)
            <li>
                <div class="card">

                  <div class="card-content">
                    <div class="row">
                        <div class="media col-sm">
                        <div class="media-left">
                            <figure class="image is-48x48">
                            <img width="48px" height="48px" src="{{asset('storage/'.$product->image.'')}}" alt="Product image">
                            </figure>
                        </div>

                        <div class="media-content">
                            <p class="title is-4">{{$product->name}}</p>
                            <p class="subtitle is-6">${{$product->price}}</p>
                        </div>
                        </div>
                        <div class="col-sm-1"><a href="{{route('editProduct',$product)}}"><button type="submit">
                            {{ __('edit') }}
                        </button></a></div>
                        <div class="col-sm-1">
                            <form method="POST" action="{{route('deleteProduct',$product)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    {{ __('delete') }}
                                </button>

                            </form>
                        </div>

                    </div>
                    <div class="content">
                        {{$product->description}}.

                      <br>
                      <small>{{$product->created_at}}</small>
                    </div>




                  </div>
                </div>
            </li>
        @endforeach --}}

        {{-- VueJS style code --}}

            <app :server_data="{{$products}}" ></app>
    </ul>
  </div>

</div>

@endsection


