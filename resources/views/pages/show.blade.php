@extends('partials.app')
@section('seo_title',$page->seo_title ? $page->seo_title : $page->title)
@section('meta_keywords',$page->meta_keywords)
@section('meta_description',$page->meta_description)
@section('content')
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">{{ $page->title }}</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">{{ $page->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="newsPage" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="text-justify">
                            {!! $page->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
