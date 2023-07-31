@extends('front.layouts.master')
@section('title',$category->name.' kateqoriyası | '.count($articles).' yazı tapıldı')
@section('content')
<div>  
    @include('front.widgets.categoryWidgets')     

    <div class="col-md-8">  
        @include('front.widgets.articleList')
    </div>
</div>
@endsection    