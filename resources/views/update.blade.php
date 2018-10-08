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
    <form role="form"  enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Titre</label>
            <input type="text" class="form-control" name="titre" placeholder="Titre" value="{{$post->titre}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Description" value="{{$post->description}}">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="image">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <a href="/admin/accueil/edit/{{$post->id}}" class="btn btn-primary">update</a>
            <a href="/admin/accueil" class="btn btn-success">valider</a>
        </div>
    </form>
</div>

<div class="alert alert-success">
<h3>la chirurgie de {{$post->titre}} s'est déroulée avec succès.</h3>
    </div>
@stop
