@extends('back.layouts.master')
@section('content')
@section('title','Yeni səhifə')
<div class="form-control" style="border:0px">
<h1>Yeni səhifə əlavə et<h1>
    <div class="form-control" style="border:0px">
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Səhifə məlumatlarını daxil edin</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('pages.post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label><b>Səhifə başlığı</b></label>
                                    <input type="text" name="title" class="form-control" required></input>
                                </div>

                                <div class="form-group">
                                    <label><b>Səhifənin şəklini seçin</b></label>
                                    <input type="file" name="image" class="form-control" required></input>
                                </div>

                                <div class="form-group">
                                    <label><b>Səhifənin mətnini daxil edin</b></label>
                                    <textarea id="editor" name="content" class="form-control" rows="4" required></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Səhifəni paylaş</button>
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