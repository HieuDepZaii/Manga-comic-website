@extends('layouts.app')
@section('content')
    {{--    @foreach($comic as $item)--}}
    {{--        <div style="border: 1px solid black;--}}
    {{--        width: 290px;--}}
    {{--">--}}
    {{--            <ul style="margin: 10px">--}}
    {{--                <li><a href="{{route('xemTruyen',['id'=>$item->id])}}"><img style="max-width: 200px"--}}
    {{--                                                                            src="{{asset($item->anh_bia)}}"--}}
    {{--                                                                            alt="{{$item->comic_name}}"></a></li>--}}
    {{--                <li>{{$item->comic_name}}</li>--}}
    {{--                <li>{{$item->so_tap}}</li>--}}
    {{--                <li>năm xuất bản: {{$item->ngayxb}}</li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    @endforeach--}}
    <nav class="navbar navbar-expand-lg navbar-light shadow py-2 py-sm-0">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container-fluid">
                <div class="row py-3">
                    <div class="col-lg-6 col-sm-12 mb-3 mb-sm-0">
                        <ul class="navbar-nav mr-auto">
                            <!-- always use single word for li -->
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('trangChu')}}">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Popular</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Thể loại
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($category as $item)
                                    <a class="dropdown-item" href="#">{{$item->category_name}}</a>
                                    @endforeach
{{--                                    <div class="dropdown-divider"></div>--}}
{{--                                    <a class="dropdown-item" href="#">Something else here</a>--}}
                                </div>
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
                <h2 class="font-weight-bolder float-left">Lastest Manga Updates</h2>
            </div>
            <div class="col-lg-6">
                <ul class="calendar list-unstyled list-inline float-right font-weight-bold mt-3 mt-sm-0">
                    <li class="list-inline-item active">hôm nay</li>
                    <li class="list-inline-item">ngày hôm qua</li>
                    <li class="list-inline-item">Sun</li>
                    <li class="list-inline-item">Fri</li>
                    <li class="list-inline-item">Thur</li>
                    <li class="list-inline-item">Wed</li>
                </ul>
            </div>
        </div>

        <div class="posts row">
            @foreach($comic as $item)
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="card mb-3">
                    <a href="{{route('xemTruyen',['id'=>$item->id])}}"><img src="{{asset($item->anh_bia)}}" class="card-img-top" alt=""></a>
                    <div class="over text-center">
                        <div class="head text-left">
                            <h6>{{$item->comic_name}}</h6>
                        </div>
                        <div class="about-list">
                            <table class="">
                                <tbody>
                                <tr>
                                    <th scope="row">Thể loại:</th>
                                    <td>{{$item->category_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Người Upload:</th>
                                    <td>{{$item->name}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="details.html">{{$item->comic_name}}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
