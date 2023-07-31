@extends('back.layouts.master')
@section('content')
@section('title','Məqalələr')
<div class="form-control" style="border:0px">
<a href="{{route('homepage')}}" style="float: right"><button type="submit" class="btn btn-primary">Sayta get</button></a>
<h1>Silinən məqalələr<h1>
    <div class="form-control" style="border:0px">
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <a href="{{route('yazilar.index')}}" class="btn btn-primary btn-sm" style="float: right">Məqalələr</a>
                <h6 class="m-0 font-weight-bold text-primary">Hal hazırda {{$articles->count()}} silinmiş məqalə var</h6>
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
                                    <a href="{{route('recover',$article->id)}}" title="Bərpa et" class="btn btn-sm btn-primary"><i class="fa fa-recycle"></i></a>
                                    <a href="{{route('hardDelete',$article->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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