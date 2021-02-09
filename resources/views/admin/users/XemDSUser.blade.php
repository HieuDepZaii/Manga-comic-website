@extends('layouts.app')
@section('content')
    {{--    @foreach($user as $item)--}}
    {{--    <div style="margin:50px">--}}
    {{--        <ul>--}}
    {{--            <li><img style="max-width: 60px" src="{{asset($item->avatar)}}" alt=""></li>--}}
    {{--            <li>{{$item->name}}</li>--}}
    {{--            <li>{{$item->email}}</li>--}}
    {{--            <form action="{{route('admin.xoaUser',['id'=>$item->id])}}" method="post">--}}
    {{--                @csrf--}}
    {{--                @method('delete')--}}
    {{--                <button type="submit">xóa</button>--}}
    {{--            </form>--}}
    {{--            <button><a href="{{route('user.formChinhSua',['id'=>$item->id])}}">chỉnh sửa thông tin</a></button>--}}
    {{--        </ul>--}}
    {{--    </div>--}}
    {{--    @endforeach--}}
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
        <h1 class="font-weight-bold text-secondary">Danh sách users</h1>
{{--        <a class="btn btn-primary" href="{{route('tacgia.formDangTruyen')}}">thêm truyện</a>--}}
            @foreach($user as $item)
            <div style="margin:50px" class="bg-light border rounded">
                <ul style="list-style-type: none" class="m-3">
                    <li><img style="max-width: 60px" src="{{asset($item->avatar)}}" alt=""></li>
                    <li><b>Tên user: </b>{{$item->name}}</li>
                    <li><b>email: </b>{{$item->email}}</li>
                    <form action="{{route('admin.xoaUser',['id'=>$item->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger mt-2" type="submit">xóa</button>
                    </form>
                    <a class="btn btn-primary mt-2" href="{{route('user.formChinhSua',['id'=>$item->id])}}">chỉnh sửa thông tin</a>
                </ul>
            </div>
            @endforeach
        <a class="btn btn-danger m-3" href="{{route('admin.view')}}">Cancer</a>
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
