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
                        <div class="form-control"> <h4 class"m-0 font-weight-bold text-primary">Kateqoriyanı redaktə et</h4></div>
                        </div>
                        <div class="card-body">
                        <div class="card-body">
                <div class="table-responsive">
                <form method="post" action="{{route('category.update',$category->id) }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label><b>Məqalə başlığı</b></label>
                                    <input type="hidden" name="id" id="category_id">
                                    <input type="text" name="title" value="{{ $category->name }}" class="form-control" required></input>
                                </div>
                                <div class="form-group">
                                    <label><b>Slug</b></label>
                                    <input type="hidden" name="slug">
                                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" required></input>
                                </div>

                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Kateqoriyanı yenilə</button>
                                </div>


                            </form>

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

<script>
  $(function() {
    $('.edit-click').click(function(){
        alert("basildi");
});
    $('.switch').change(function() {
      console.log($(this)[0].getAttribute('id'));
    })
  })
</>
@endsection