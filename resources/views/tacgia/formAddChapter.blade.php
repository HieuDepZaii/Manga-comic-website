@extends('layouts.app')
@section('content')
    {{--        {{session('msg')}}--}}
    {{--        <form action="{{route('tacgia.addChapter')}}" method="post" enctype="multipart/form-data">--}}
    {{--            @csrf--}}
    {{--            <ul>--}}
    {{--                <li>tên chapter: <input type="text" name="chapter_name"></li>--}}
    {{--                <li>tập : <input type="text" name="chapter_number"></li>--}}
    {{--                <li>truyện: <select name="comic_id" id="">--}}
    {{--                        @foreach($comic as $item)--}}
    {{--                            <option value="{{$item->id}}">{{$item->comic_name}}</option>--}}
    {{--                        @endforeach--}}
    {{--                    </select></li>--}}
    {{--                <li>ngày upload: <input type="text" name="upload_date"></li>--}}
    {{--                <li>image upload: <input type="file" name="image_content[]" multiple></li>--}}
    {{--                <button type="submit">upload</button>--}}
    {{--            </ul>--}}
    {{--        </form>--}}
    <nav class="navbar navbar-expand-lg navbar-light shadow py-2 py-sm-0">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container-fluid">
                <div class="row py-3">
                    <div class="col-lg-6 col-sm-12 mb-3 mb-sm-0">
                        <ul class="navbar-nav mr-auto">
                            <!-- always use single word for li -->
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('trangChu')}}">Home<span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('admin.view')}}">Admin Page<span
                                        class="sr-only">(current)</span></a>
                            </li>


                        </ul>
                    </div>
                    <div class="col">
                        <form class="form-inline search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type Title, auther or genre"
                                       aria-label="Type Title, auther or genre">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <!-- end navbar-->

    <!-- start slider -->
    <div id="mangaslider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('frontend/img/slider1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('frontend/img/slider2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('frontend/img/slider3.jpg')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#mangaslider" role="button" data-slide="prev">
            <div><span class="carousel-control-prev-icon" aria-hidden="true"></span></div>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mangaslider" role="button" data-slide="next">
            <div><span class="carousel-control-next-icon" aria-hidden="true"></span></div>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end slider -->

    <!-- start lastest -->
    <div class="lastest container mt-4 mt-sm-5">

        <div class="row">
            <div class="col-lg-6">
                {{--                <h2 class="font-weight-bolder float-left">Lastest Manga Updates</h2>--}}
            </div>
            <div class="col-lg-6">
                <ul class="calendar list-unstyled list-inline float-right font-weight-bold mt-3 mt-sm-0">
                    <li class="list-inline-item active">Today</li>
                    <li class="list-inline-item">Yesterday</li>
                    <li class="list-inline-item">Sun</li>
                    <li class="list-inline-item">Fri</li>
                    <li class="list-inline-item">Thur</li>
                    <li class="list-inline-item">Wed</li>
                </ul>
            </div>
        </div>
        <h1 class="font-weight-bold text-secondary">Upload Chapter</h1><br>
        <h3 class="text-success font-weight-bold">{{session('msg')}}</h3>

        <form action="{{route('tacgia.addChapter')}}" method="post" enctype="multipart/form-data">
            @csrf
            <ol>
                <li><b>tên chapter:</b> <input type="text" name="chapter_name"></li>
                <li><b>tập :</b> <input type="text" name="chapter_number"></li>
                <li><b>Tập truyện:</b> <select name="comic_id" id="">
                        @foreach($comic as $item)
                            <option value="{{$item->id}}">{{$item->comic_name}}</option>
                        @endforeach
                    </select></li>
                <li><b>ngày upload:</b> <input type="text" name="upload_date"></li>
                <li><b>upload ảnh truyện:</b> <input type="file" name="image_content[]" multiple></li>
                <button class="btn btn-primary" type="submit">upload</button>
                <a class="btn btn-danger" href="{{route('admin.view')}}">Cancer</a>
            </ol>
        </form>

    </div>
    <!-- end lastest -->

    <!-- start footer -->
    <footer>
        <div class="container py-4">
            <span class="copyright">&copy; 2021 Truyện Vui Lắm</span>
            <span class="design float-right">Designed by @hieudt</span>
        </div>
    </footer>
    <!-- end footer -->
@endsection
