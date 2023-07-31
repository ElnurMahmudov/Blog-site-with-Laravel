@if(count($articles)>0)       
                    <!-- Post preview-->
                @foreach($articles as $article)

                    <div class="post-preview">
                        
                        <a href="{{route('single',$article->slug)}}">
                            <img src="{{asset($article->image)}}"  width="650px"/>
                            <h2 class="post-title">{{$article->title}}</h2>
                            <h4 class="post-subtitle">{!!Str::limit($article->content,200,'...')!!}</h4>
                        </a>
                        <p class="post-meta">
                            Kateqoriya: 
                            <a href="#!">{{$article->getcategory->name}}</a><p class="d-flex justify-content-end">{{$article->created_at->diffForHumans()}}</p>
                        </p>
                    </div>
                   <hr>
                 @endforeach 
                 {{$articles->links('pagination::bootstrap-4')}}
            @else
                <div class="alert alert-danger">
                    <h2>Bu kateqoriyaya aid heç bir yazı tapılmadı</h2>
                </div>     
@endif