@extends('back.layouts.master')
@section('content')
@section('title','Məqaləni redaktə et')
<div class="form-control" style="border:0px">
<h3>"{{$articles->title}}" məqaləsini redaktə et <h3>
    <div class="form-control" style="border:0px">
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Məqalənin yeni məlumatlarını daxil edin</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('yazilar.update',$articles->id)}}" enctype="multipart/form-data">
                            @method('PUT')    
                            @csrf
                                <div class="form-group">
                                    <label><b>Məqalə başlığı</b></label>
                                    <input type="text" name="title" value="{{ $articles->title }}" class="form-control" required></input>
                                </div>

                                <div class="form-group">
                                    <label><b>Məqalənin kategoriyası</b></label>
                                    <select name="category" class="form-control" required>
                                        <option value="">Kateqoriya seçin</option>
                                        @foreach($categories as $category)
                                        <option @if($articles->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label><b>Məqalənin şəklini seçin</b></label> <br> 
                                    <img src="{{asset($articles->image)}}" class="img-thumbnail rounded" width="250px"><br><br>
                                    <input type="file" name="image" class="form-control"></input>
                                </div>

                                <div class="form-group">
                                    <label><b>Məqalənin mətnini daxil edin</b></label>
                                    <textarea id="editor" name="content" class="form-control" rows="4" required>{!! $articles->content !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Məqaləni yenilə</button>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
    </div>    
</div>    
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
  $('#editor').summernote(
    {
    'height':200
  }
  );
});

</script>
@endsection