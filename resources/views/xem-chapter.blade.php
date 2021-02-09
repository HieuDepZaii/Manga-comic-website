@extends('layouts.app')
@section('content')
    {{--    <h1>{{$comic->comic_name}} - Chapter: {{$chapter->chapter_number}}</h1>--}}
    {{--    @foreach($imgdata as $item)--}}
    {{--        <img style="clear: both" src="{{asset($item)}}" alt="">--}}
    {{--        <br>--}}
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
                            <li class="nav-item">
                                <a class="nav-link" href="#">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Populer</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Thể Loại
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
            <div class="navbar-brand">
                {{$comic->comic_name}} - Chapter: {{$chapter->chapter_number}}
            </div>
            <div class="container py-4">
                <select name="" onchange="location = this.value;">
                    <option value="">chọn chapter</option>
                    @foreach($chapter_all as $item)
                        <option value="{{route('xemChapter',['comic_id'=>$item->comic_id,'chapter_id'=>$item->id])}}">Chapter {{$item->chapter_number}}</option>
                    @endforeach
                </select>
            </div>
            {{--            <i class="far fa-bookmark fa-3x"></i>--}}
            <div class="row">
                @foreach($imgdata as $item)
                    <div class="cover col-*">
                        <img class="shadow" style="width:1000px" src="{{asset($item)}}" alt=""><br>
                    </div>
                    <div></div>
                @endforeach

                {{--            <div class="info col">--}}
                {{--                --}}
                {{--            </div>--}}
                {{--            </div>--}}

            </div>
        </div>
        <!-- end reading intro -->

        <!-- start intro lists -->
    {{--<div class="container my-5 bg-white">--}}
    {{--    <div class="intro-lists">--}}
    {{--        <div class="head-list row bg-light">--}}
    {{--            <ul class="list-unstyled list-inline">--}}
    {{--                <li class="list-inline-item"><a data-toggle="tab" class="active" href="#ch">Ch.</a></li>--}}
    {{--                <li class="list-inline-item"><a data-toggle="tab" href="#vol">VOL.</a></li>--}}
    {{--                <li class="list-inline-item"><a data-toggle="tab" href="#related">Related</a></li>--}}
    {{--                <li class="list-inline-item"><a data-toggle="tab" href="#gallery">Gallery</a></li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--        <div class="tab-content">--}}

    {{--            <!-- start ch -->--}}
    {{--            <div id="ch" class="tab-pane fade in active show">--}}
    {{--                <div class="row">--}}
    {{--                    <table class="table table-striped">--}}
    {{--                        <tbody>--}}
    {{--                        <tr>--}}
    {{--                            <th><a href="details.html">CH. 1, Luffy in the island with two nigga</a></th>--}}
    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <th><a href="details.html">CH. 2, Luffy in the garden with two nigga</a></th>--}}
    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <th><a href="details.html">Ch. 3, Luffy in the school with two nigga</a></th>--}}
    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
    {{--                        </tr>--}}
    {{--                        </tbody>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- end ch -->--}}

    {{--            <!-- start vol -->--}}
    {{--            <div id="vol" class="tab-pane fade">--}}
    {{--                <div class="row">--}}
    {{--                    <table class="table table-striped">--}}
    {{--                        <tbody>--}}
    {{--                        <tr>--}}
    {{--                            <th><a href="details.html">VOL. 2, Luffy in the island</a></th>--}}
    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <th><a href="details.html">VOL. 2, Luffy in the garden</a></th>--}}
    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <th><a href="details.html">VOL. 3, Luffy in the school</a></th>--}}
    {{--                            <td class="text-muted text-uppercase float-right">8 hours ago</td>--}}
    {{--                        </tr>--}}
    {{--                        </tbody>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- end vol -->--}}

    {{--            <!-- start related -->--}}
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
    {{--            <!-- end related -->--}}

    {{--            <!-- start gallery -->--}}
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
    {{--            <!-- end gallery-->--}}

    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <!-- end sh. list -->

        <!-- start footer -->
        <footer>
            <div class="container py-4">
                <span class="copyright">&copy; 2021 Truyện Vui Lắm</span>
                <span class="design float-right">Designed by @hieudt</span>
            </div>
        </footer>
@endsection
