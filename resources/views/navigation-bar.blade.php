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
                    <form class="form-inline search" >

                        <div class="input-group">
                            <input type="text" id="search_box" class="form-control" placeholder="Type Title, auther or genre"
                                   aria-label="Type Title, auther or genre">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="searchComics()"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
