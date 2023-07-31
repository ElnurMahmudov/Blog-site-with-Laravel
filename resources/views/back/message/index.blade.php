@extends('back.layouts.master')
@section('content')
@section('title','Mesajlar')
<div class="form-control" style="border:0px">
<a href="{{route('homepage')}}" style="float: right"><button type="submit" class="btn btn-primary">Sayta get</button></a>
<h1>Bütün Mesajlar<h1>
    <div class="form-control" style="border:0px">
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hal hazırda {{$messages->count()}} Mesaj var</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Ad, soyad</th>
                                <th>Tarix</th>
                                <th>E-mail</th>
                                <th>Telefon</th>
                                <th>Mesaj</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        @foreach($messages as $message)
                        <tbody id="orders">
                            <tr>
                            <td><h5>{{$message->name}}</h5></td>
                            <td><p>{{$message->created_at->diffforHumans()}}</p></td>
                            <td><p>{{$message->email}}</p></td>
                            <td><p>{{$message->phone}}</p></td>
                            <td><p>{{$message->message}}</p></td>
                                <td>
                                    <a href="{{route('message.delete',$message->id)}}" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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

@endsection