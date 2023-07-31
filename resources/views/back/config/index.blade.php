@extends('back.layouts.master')
@section('content')
@section('title','Parametrlər')
<div class="form-control" style="border:0px">
<a href="{{route('homepage')}}" style="float: right"><button type="submit" class="btn btn-primary">Sayta get</button></a>
<h1>Parametrlər<h1>
    <div class="form-control" style="border:0px">
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sayt başlığı və statusu</h6>
            </div>
            <div class="card-body">
                    <form method="post" action="{{route('config.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>Sayt başlığı</h4>
                                    <input type="text" name="title" value="{{$config->title}}" class="form-control" required> 
                            </div> 
                            <div class="col-md-6">
                                    <h4>Sayt statusu</h4>
                                    <select class="form-control" name="active">
                                        <option @if($config->active=1) selected @endif value="1">Aktiv</option>
                                        <option @if($config->active=0) selected @endif value="0">Passiv</option>
                                    </select>
                            </div> 
                        </div>   
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Loqo</h6>
            </div>
            <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>Logo</h4>
                                    <img src="{{asset($config->logo)}}" class="img-thumbnail rounded" width="150px">
                                    <input type="file" class="form-control" name="logo">
                            </div> 
                            <div class="col-md-6">
                                    <h4>Fav icon</h4>
                                    <img src="{{asset($config->favicon)}}" class="img-thumbnail rounded" width="150px">
                                   <input type="file" class="form-control" name="favicon">
                            </div> 
                        </div>   
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sosial media</h6>
            </div>
            <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>Facebook</h4>
                                    <input type="text" name="facebook" value="{{$config->facebook}}" class="form-control"> 
                            </div> 
                            <div class="col-md-6">
                                    <h4>Instagram</h4>
                                    <input type="text" name="instagram" value="{{$config->instagram}}" class="form-control"> 
                            </div> 
                        </div>   
            </div>

            <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>Twitter</h4>
                                    <input type="text" name="twitter" value="{{$config->twitter}}" class="form-control"> 
                            </div> 
                            <div class="col-md-6">
                                    <h4>Github</h4>
                                    <input type="text" name="github" value="{{$config->github}}" class="form-control"> 
                            </div> 
                        </div>   
            </div>

            <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>Linkedin</h4>
                                    <input type="text" name="linkedin" value="{{$config->linkedin}}" class="form-control"> 
                            </div> 
                            <div class="col-md-6">
                                    <h4>Youtube</h4>
                                    <input type="text" name="youtube" value="{{$config->youtube}}" class="form-control"> 
                            </div> 
                        </div>   
            </div>
            
            <div class="card-body">
                        <div class="row">
                            <button type="submit" class="btn btn-block btn-md btn-success">Yenilə</button>
                        </div>   <br><br>
                    </form>
            </div>
        </div>
    </div>
    </div>    
</div>    
@endsection
