@extends('layouts.app')

@section('content')
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
          <div class="col-sm-1"><a href="/products/{id}/edit">edit</a></div>
          <div class="col-sm-1">delete</div>
      </div>
      <div class="content">
          {{$product->description}}.

        <br>
        <small>{{$product->created_at}}</small>
      </div>




    </div>
  </div>
@endsection
