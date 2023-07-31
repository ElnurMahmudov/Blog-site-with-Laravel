@isset($categories)
<div class"col-md-3">
    <div class="list-group" style="width: 200px; float:right">
        <a href="#" class="list-group-item "><h5 style="color:blue">Kateqoriyalar</h5></a>
        @foreach($categories as $category)
        <a href="{{route('category',$category->slug)}}" class="list-group-item  @if(Request::segment(2)==$category->slug) active @endif">{{$category->name}}<b style="color:red; float:right">{{$category->articleCount()}}</b></a>
        @endforeach
    </div>
</div>   
@endif