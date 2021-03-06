@extends('partials.app')

@section('seo_title',$sale->seo_title ? $sale->seo_title : $sale->title)
@section('meta_keywords',$sale->meta_keywords)
@section('meta_description',$sale->meta_description)
@section('content')
    <div class="sales-page def-page">
        <div class="pre-header">
            <div
                class="container"> @include('partials.breadcrumbs',['title'=>'Акции','subtitle'=> $sale->title,'titleLink'=> route('sales.index')])
                <h1>{{$sale->title}}</h1></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="content col-12">
                    <div class="about-content">
                        <div class="text-content">
                            <div class="row page-header">
                                <div class="col-5">
                                    <picture>
                                        <source
                                            srcset="{{str_replace(pathinfo(Voyager::image($sale->image),PATHINFO_EXTENSION),'webp',Voyager::image($sale->image))}}"
                                            type="image/webp">
                                        <source srcset="{{Voyager::image($sale->image)}}" type="image/jpeg">
                                        <img src="{{Voyager::image($sale->image)}}" alt="{{$sale->title}}"></picture>
                                </div>
                                <div class="col-7"><h2>{{$sale->title}}</h2>
                                    <p>{{$sale->excerpt}}</p></div>
                            </div>{!! $sale->body !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>@endsection
