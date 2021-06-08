@extends('layouts.app')
@section('content')
    <h1>Kết quả tìm kiếm:</h1><br>
    @foreach($search_results as $item)
        <fieldset >
            <a href="{{route('xemTruyen',['id'=>$item->id])}}"><img style="max-width: 200px;" src="{{asset($item->anh_bia)}}" alt=""></a>
            <a href="{{route('xemTruyen',['id'=>$item->id])}}"><h3>{{$item->comic_name}}</h3></a>


        </fieldset>

    @endforeach
{{--    {{$comic_name}}--}}
@endsection
