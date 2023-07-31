@extends('front.layouts.master')
@section('title','Ana səhifə')
@section('content')     
<div>  
    @include('front.widgets.categoryWidgets')     
        <div class="col-md-8">         
               @include('front.widgets.articleList')
        </div>                             
</div>
@endsection    