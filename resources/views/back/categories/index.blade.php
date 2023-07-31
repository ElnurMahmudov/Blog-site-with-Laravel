@extends('back.layouts.master')
@section('content')
@section('title','Kategoriyalar')
<div class="form-control" style="border:0px">
    <a href="{{route('homepage')}}" style="float: right"><button type="submit" class="btn btn-primary">Sayta get</button></a>
    <h1>Bütün kateqoriyalar<h1>
        <div class="form-control" style="border:0px">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div classs"card-header py-3">
                        <div class="form-control"> <h4 class"m-0 font-weight-bold text-primary">Yeni kateqoriya yarat</h4></div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('category.create')}}">
                                @csrf
                                <div class="form-group">
                                    <label><h5>Kateqoriya adı:</h5></label>
                                        <input type="text" class="form-control" name="category" required><br>
                                    <div>
                                        <button type="submit" class="btn btn-primary float-right">Əlavə et</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>  
                
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div classs"card-header py-3">
                        <div class="form-control"> <h4 class"m-0 font-weight-bold text-primary">Bütün kateqoriyalar</h4></div>
                        </div>
                        <div class="card-body">
                        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kateqoriyanın adı</th>
                                <th>Məqale sayı</th>
                                <th>Ayarlar</th>
                            </tr>
                        </thead>
                        @foreach($categories as $category)
                        <tbody>
                            <tr>
                                <td><h5>{{$category->name}}</h5></td>
                                <td><h5>{{$category->articleCount()}}<h5></td>
                                <td>
                                    <a href="{{route('category.edit', $category->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                    <a href="{{route('category.delete',$category->id)}}" title="Sil" name="sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>    
</div>  


@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

@endsection