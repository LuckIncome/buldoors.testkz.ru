@extends('partials.app')
@section('seo_title',$post->seo_title ? $post->seo_title : $post->title)
@section('meta_keywords',$post->meta_keywords)
@section('meta_description',$post->meta_description)
@section('content')
    <div id="product-product" class="">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">{{$post->title}}</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">{{$post->title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="newsPage" class=" py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mb-4 mb-xl-0">
                        <!--<h2>{{$post->title}}</h2>
                        <span class="d-block mb-3" style="font-size: 14px;color: rgba(0, 0, 0, 0.5);"><img src="{{Storage::disk('public')->url($post->image)}}" width="10" height="10" alt="" class="mr-2">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y')}}</span>-->
                        <div class="text-justify">{!! $post->body !!}</div>
                        <hr class="mb-0 d-block d-xl-none">
                    </div>
                    <div class="col-xl-3">
                        <section id="news" class="">
                            <div class="row">
                                @foreach($posts as $postItem)
                                <div class="col-sm-6 col-xl-12 p-4">
                                    <div class="newsItem">
                                        <img src="{{Storage::disk('public')->url($postItem->image)}}" alt="новость" class="d-block">
                                        <div class="p-3 newsCaption">
                                            <time datetime="" class="d-block mb-3">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $postItem->created_at)->format('d.m.Y')}}</time>
                                            <p class="mb-3"><strong>{{$postItem->title}}</strong></p>
                                            <span class="mb-2 d-block">{!! \Illuminate\Support\Str::limit($post->excerpt, 90)!!}</span>
                                            <a href="/news/{{$postItem->slug}}" class="moreNews">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
