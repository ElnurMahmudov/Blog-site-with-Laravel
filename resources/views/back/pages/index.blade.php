@extends('back.layouts.master')
@section('content')
@section('title','Səhifələr')
<div class="form-control" style="border:0px">
<a href="{{route('homepage')}}" style="float: right"><button type="submit" class="btn btn-primary">Sayta get</button></a>
<h1>Bütün səhifələr<h1>
    <div class="form-control" style="border:0px">
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hal hazırda {{$pages->count()}} səhifə var</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Şəkil</th>
                                <th>Başlıq</th>
                                <th>Mətn</th>
                                <th>Ayarlar</th>
                            </tr>
                        </thead>
                        @foreach($pages as $page)
                        <tbody id="orders">
                            <tr id="_page{{$page->id}}">
                                <td><img src="{{asset($page->image)}}" class="img-thumbnail rounded" width="250px"></td>
                                <td><h5>{{$page->title}}</h5></td>
                                <td><p>{!!$page->content!!}</p></td>

                                <td>
                                    <a href="{{route('page',$page->slug)}}" title="Bax" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('pages.edit',$page->id)}}" title="Edit" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                    <a href="{{route('pages.delete',$page->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>