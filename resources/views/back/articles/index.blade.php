@extends('back.layouts.master')
@section('content')
@section('title','Məqalələr')
<div class="form-control" style="border:0px">
<a href="{{route('homepage')}}" style="float: right"><button type="submit" class="btn btn-primary">Sayta get</button></a>
<h1>Bütün məqalələr<h1>
    <div class="form-control" style="border:0px">
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="{{route('trashed')}}" class="btn btn-warning btn-sm" style="float: right"><i class="fa fa-trash"></i> Silinən məqalələr</a>
                <h6 class="m-0 font-weight-bold text-primary">Hal hazırda {{$articles->count()}} məqalə var</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Şəkil</th>
                                <th>Başlıq</th>
                                <th>Kateqoriya</th>
                                <th>Baxılıb</th>
                                <th>Yaradılma tarixi</th>
                                <th>Ayarlar</th>
                            </tr>
                        </thead>
                        @foreach($articles as $article)
                        <tbody>
                            <tr>
                                <td><img src="{{asset($article->image)}}" class="img-thumbnail rounded" width="250px"></td>
                                <td><h5>{{$article->title}}</h5></td>
                                <td><h5>{{$article->getCategory->name}}<h5></td>
                                <td><h5>{{$article->hit}} dəfə</h5></td>
                                <td><h5>{{$article->created_at->diffforHumans()}}</h5></td>
                                <td>
                                    <a href="{{route('single',$article->slug)}}" title="Bax" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('yazilar.edit',$article->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                    <a href="{{route('delete',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
  $(function() {
    $('.switch').change(function() {
      console.log($(this)[0].getAttribute('id'));
    })
  })
</>
@endsection