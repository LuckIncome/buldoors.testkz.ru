@extends('partials.app')
@section('meta_description',$description ? $description : 'Новости')
@section('seo_title',$seoTitle ? $seoTitle  : 'Новости')
@section('meta_keywords',$keywords ? $keywords  : 'Новости')
@section('content')
    <div id="product-category">
        <section id="breadcrumbs">
            <div class="container-fluid px-0 py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 mb-1 d-none d-sm-block">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                <li class="list-inline-item"><a href="#">Новости</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <h1 class="m-0">Новости</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="news" class="py-3 py-xl-5">
            <div class="container">
                <div class="row d-flex justify-content-around">
                    @foreach($posts as $post)
                    <div class="col-md-4 col-sm-6 p-4">
                        <div class="newsItem">
                            <a href="/news/{{$post->slug}}"
                               class=""><img src="{{Storage::disk('public')->url($post->image)}}"
                                             alt="новость" class="d-block"></a>
                            <div class="p-3 newsCaption">
                                <time datetime="" class="d-block mb-3">{{$post->created_at}}</time>
                                <p class="mb-3"><strong>{{$post->title}}</strong></p>
                                <span class="mb-2 d-block">{!! \Illuminate\Support\Str::limit($post->excerpt, 120)!!}</span>
                                <a href="/news/{{$post->slug}}"
                                   class="moreNews">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
