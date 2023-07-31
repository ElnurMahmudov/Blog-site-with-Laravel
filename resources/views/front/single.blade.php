@extends('front.layouts.singleMaster')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
<div>  
    @include('front.widgets.categoryWidgets')     
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-left">
                <div class="col-md-15 col-lg-10 col-xl-9">
                    <div class="post-preview">                  
                        <a href="{{route('single',$article->slug)}}">
                            <h2 class="post-title">{{$article->title}}</h2><br>
                            <h4 class="post-subtitle">{!!$article->content!!}</h4>
                        </a><br><br>
                        <p class="post-meta">
                            Kateqoriya: 
                            <a href="#!">{{$article->getcategory->name}}</a>
                            <p class="post-meta">Oxunub: <b>{{$article->hit}} dəfə</b></p>
                            <p class="post-meta">Dərc edilib: <b>{{$article->created_at->diffForHumans()}}</b></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection    