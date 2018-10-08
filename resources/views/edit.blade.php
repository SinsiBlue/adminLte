@extends('adminlte::page')

@section('title', 'AdminLTE')

{{-- @section('content_header')
<h1>Dashboard</h1>
@stop --}}

@section('content')
<h3>chirurgie beau gosse <strong>{{$post->titre}}</strong></h3>

<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="/admin/accueil/update/{{$post->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" name="titre" placeholder="Titre" value="{{old('titre', $post->titre)}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Description" value="{{old('description', $post->description)}}">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="image">
                <img src="{{Storage::url($post->imageUrl)}}" alt="image {{$post->titre}}">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">update</button>
            <a href="/admin/accueil" class="btn btn-danger">annuler</a>
        </div>
    </form>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
            <h3>la chirchurgie de {{$post->titre}} a échoué:</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@stop
