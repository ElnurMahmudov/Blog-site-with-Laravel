@extends('front.layouts.pageMaster')
@section('title',$page->title)
@section($page->image)
@section('content')
<div>  
    @include('front.widgets.categoryWidgets')     
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-left">
                <div class="col-md-15 col-lg-10 col-xl-9">
                    <div class="post-preview">                  
                        <a href="{{route('page',$page->slug)}}">
                            <h2 class="post-title">{{$page->title}}</h2><br>
                            <h4 class="post-subtitle">{!!$page->content!!}</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection    