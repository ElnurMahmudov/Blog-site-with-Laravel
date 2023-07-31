@extends('front.layouts.master')
@section('title','Əlaqə')
@section('content')
<div>  
<!-- Main Content-->
<main class="mb-4">
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $error)
                {{$error}} <br>
            @endforeach
            @endif
            <h3>Bizimlə əlaqə</h3>
            <form method="post" action="{{route('contactpost')}}">
                @csrf
            <div class="my-5">
            
                    <div class="form-floating">
                        <input class="form-control" name="name" value="{{old('name')}}" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Ad, soyad</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Bütün xanaları doldurmağınız şərtdir</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                        <label for="email">E-poçt ünvanı</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Bütün xanaları doldurmağıbız şərtdir</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Bütün xanaları doldurmağıbız şərtdir</div>
                    </div>
                    <div class="form-floating">
                        <input class="form-control" name="phone" value="{{old('phone')}}" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                        <label for="phone">Əlaqə nömrəsi</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Bütün xanaları doldurmağıbız şərtdir</div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="message" value="{{old('message')}}" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                        <label for="message">Mesaj</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Bütün xanaları doldurmağıbız şərtdir</div>
                    </div>
                    <br />
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <button type="submit" class="btn btn-primary" >Göndər</button>
            </div>
            </form>
        </div>
    </div>
</div>
</main>
</div>
@endsection    