@extends('layouts.app')
@section('content')
    {{--    <div style="margin-left:50px">--}}
    {{--        <h1>{{$comic->comic_name}}</h1>--}}
    {{--        <ul>--}}
    {{--            <li><img style="max-width: 200px" src="{{asset($comic->anh_bia)}}" alt=""></li>--}}
    {{--            <li><h3>nội dung truyện: {{$comic->mota}}</h3></li>--}}
    {{--        </ul>--}}
    {{--        <h2>Danh sách chapter :</h2>--}}
    {{--        <ul>--}}
    {{--            @foreach($chapter as $item)--}}
    {{--                <li><a href="{{route('xemChapter',['comic_id'=>$comic->id,'chapter_id'=>$item->id])}}"> Chapter--}}
    {{--                        : {{$item->chapter_number}} - {{$item->chapter_name}} </a></li>--}}
    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--        <div>--}}
    {{--            Bình luận: <br>--}}
    {{--            <form action="{{route('uploadComment',['comic_id'=>$comic->id,'user_id'=>Auth::user()->id])}}"--}}
    {{--                  method="post">--}}
    {{--                @csrf--}}
    {{--                <textarea name="comment_content" id="" cols="40" rows="3"></textarea><br>--}}
    {{--                <button type="submit">Bình luận</button>--}}
    {{--            </form>--}}
    {{--            @foreach($comment as $item)--}}
    {{--                {{$item->name}} : {{$item->comment_content}} <br>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}
    {{--    </div>--}}
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

    <!-- start reading intro -->
    <div class="container my-5">
        <div class="read-intro bg-light">
            {{--        <i class="far fa-bookmark fa-3x"></i>--}}
            <div class="row">
                <div class="cover col-*">
                    <img class="shadow" src="{{asset($comic->anh_bia)}}" alt="" width="300">
                </div>
                <div class="info col">
                    <h2 class="head">{{$comic->comic_name}}</h2>
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th scope="row">Thể loại:</th>
                            <td>{{$comic->category_name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Người Up Truyện:</th>
                            <td>{{$comic->name}}</td>
                        </tr>
                        {{--                    <tr>--}}
                        {{--                        <th scope="row">Update:</th>--}}
                        {{--                        <td>VOL. 125</td>--}}
                        {{--                    </tr>--}}
                        <tr>
                            <th scope="row">Rating:</th>
                            <td><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i
                                    class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i
                                    class="fa fa-star-half-alt fa-2x"></i> <span
                                    class="font-weight-bold ml-3">(10/9)</span></td>
                        </tr>
                        </tbody>
                    </table>
                    <h5>Mô tả:</h5>
                    <p>
                        {{$comic->mota}}
                    </p>
                </div>
            </div>
            {{--        <div class="row">--}}
            {{--            <a class="btn btn-red my-3 mx-1 px-5" href="#">Start reading VOL. 1</a>--}}
            {{--        </div>--}}
        </div>
    </div>
    <!-- end reading intro -->

    <!-- start intro lists -->
    <div class="container my-5 bg-white">
        <div class="intro-lists">
            <div class="head-list row bg-light">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item"><a data-toggle="tab" class="active" href="#ch">Chapter</a></li>
                    {{--                <li class="list-inline-item"><a data-toggle="tab" href="#vol">VOL.</a></li>--}}
                    {{--                <li class="list-inline-item"><a data-toggle="tab" href="#related">Related</a></li>--}}
                    {{--                <li class="list-inline-item"><a data-toggle="tab" href="#gallery">Gallery</a></li>--}}
                </ul>
            </div>
            <div class="tab-content">

                <!-- start ch -->
                <div id="ch" class="tab-pane fade in active show">
                    <div class="row">
                        <table class="table table-striped">
                            <tbody>
                            @foreach($chapter as $item)
                                <tr>
                                    <th>
                                        <a href="{{route('xemChapter',['comic_id'=>$comic->id,'chapter_id'=>$item->id])}}">Chapter.{{$item->chapter_number}} {{$item->chapter_name}}</a>
                                    </th>
                                    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end ch -->

                <!-- start vol -->
                <div id="vol" class="tab-pane fade">
                    <div class="row">
                        <table class="table table-striped">
                            <tbody>
                            @foreach($chapter as $item)
                                <tr>
                                    <th>
                                        <a href="{{route('xemChapter',['comic_id'=>$comic->id,'chapter_id'=>$item->id])}}">Chapter.{{$item->chapter_number}} {{$item->chapter_name}}</a>
                                    </th>
                                    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end vol -->

                <!-- start related -->
            {{--            <div id="related" class="tab-pane fade">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-lg-3 col-md-4 col-sm-6">--}}
            {{--                        <a href="details.html">--}}
            {{--                            <div class="card mb-3">--}}
            {{--                                <img src="img/cover2.jpg" class="card-img-top" alt="">--}}
            {{--                                <div class="card-body">--}}
            {{--                                    <h5 class="card-title">One piece</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                    </div>--}}
            {{--                    <div class="col-lg-3 col-md-4 col-sm-6">--}}
            {{--                        <a href="details.html">--}}
            {{--                            <div class="card mb-3">--}}
            {{--                                <img src="img/cover2.jpg" class="card-img-top" alt="">--}}
            {{--                                <div class="card-body">--}}
            {{--                                    <h5 class="card-title">One piece</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                    </div>--}}
            {{--                    <div class="col-lg-3 col-md-4 col-sm-6">--}}
            {{--                        <a href="details.html">--}}
            {{--                            <div class="card mb-3">--}}
            {{--                                <img src="img/cover2.jpg" class="card-img-top" alt="">--}}
            {{--                                <div class="card-body">--}}
            {{--                                    <h5 class="card-title">One piece</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                    </div>--}}
            {{--                    <div class="col-lg-3 col-md-4 col-sm-6">--}}
            {{--                        <a href="details.html">--}}
            {{--                            <div class="card mb-3">--}}
            {{--                                <img src="img/cover2.jpg" class="card-img-top" alt="">--}}
            {{--                                <div class="card-body">--}}
            {{--                                    <h5 class="card-title">One piece</h5>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                    </div>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            <!-- end related -->

                <!-- start gallery -->
            {{--            <div id="gallery" class="tab-pane fade">--}}
            {{--                <div class="imgrow">--}}
            {{--                    <div class="imgcol">--}}
            {{--                        <img src="img/cover1.jpg" width="100%">--}}
            {{--                        <img src="img/slider1.jpg" width="100%">--}}
            {{--                        <img src="img/apex-section-bg-legends-caustic-xl.jpg.adapt.320w.jpg" width="100%">--}}

            {{--                    </div>--}}
            {{--                    <div class="imgcol">--}}
            {{--                        <img src="img/76693209_2445782385645459_1824072803884728320_n.jpg" width="100%">--}}
            {{--                        <img src="img/slider1.jpg" width="100%">--}}
            {{--                        <img src="img/cover4.jpg" width="100%">--}}
            {{--                    </div>--}}
            {{--                    <div class="imgcol">--}}
            {{--                        <img src="img/72561095_1152623741615641_762555470421426176.jpg" width="100%">--}}
            {{--                        <img src="img/47126346_671615859906817_766212574944428032_n.jpg" width="100%">--}}
            {{--                        <img src="img/cover2.jpg" width="100%">--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <!-- end gallery-->

            </div>
        </div>
    </div>
    <!-- end sh. list -->
    {{--comment--}}
    <div class="container my-5 bg-white">
        @guest
            <h4 class="text-warning">Bạn cần phải đăng nhập để có thể bình luận</h4>
        @else
            Bình luận: <br>
            <form
                action="{{route('uploadComment',['comic_id'=>$comic->id,'user_id'=>Auth::user()->id])}}"
                method="post">
                @csrf
                <textarea name="comment_content" id="" cols="40" rows="3"></textarea><br>
                <button class="btn btn-primary mb-3" type="submit">Bình luận</button>
            </form>
        @endguest

        @foreach($comment as $item)
                <div class="border border-dark rounded">
                    <img class="m-2" style="max-width: 50px;margin: auto" src="{{asset($item->avatar)}}" alt="unknown">
                    <p class="font-weight-bold text-primary ml-2">{{$item->name}}</p>
                    <p class="m-2">{{$item->comment_content}}</p>
                </div>
                <br>
        @endforeach
    </div>
    {{--end comment--}}
    <!-- start footer -->
    <footer>
        <div class="container py-4">
            <span class="copyright">&copy; 2021 Truyện Vui Lắm </span>
            <span class="design float-right">Designed by @hieudt</span>
        </div>
    </footer>
    <!-- end footer -->

@endsection
