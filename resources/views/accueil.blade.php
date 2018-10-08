@extends('adminlte::page')

@section('title', 'AdminLTE')

{{-- @section('content_header')
<h1>Dashboard</h1>
@stop --}}

@section('content')
<h3>welcome à tous les gossbo de la terre</h3>

<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="/admin/accueil/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Titre</label>
                <input type="text" class="form-control" name="titre" placeholder="Titre">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="image">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@foreach ($posts->chunk(3) as $chunk)
<div class="row mb-4">
    @foreach ($chunk as $post)
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title"><strong>{{$post->titre}}</strong></h5>
                <p class="card-text">{{$post->description}}</p>
            </div>
            <div class="card-body d-flex align-items-center mb-4" style="height: 25rem; overflow: hidden">
                <img class="card-img-top" src="{{Storage::url($post->imageUrl)}}" alt="image {{$post->titre}}">
            </div>

            <div class="card-body d-flex justify-content-between">
            <a href="/admin/accueil/edit/{{$post->id}}" class="btn btn-primary">edit</a>
            <form action="/admin/accueil/delete/{{$post->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach
@stop
