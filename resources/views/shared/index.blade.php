@extends('layouts.public_layout')
@section('content')
    <!-- blog-contents -->
                    <section class="col-md-8">
                    @foreach($posts as $post)
                        <article class="blog-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ route('post', ['post'=> $post->id]) }}">
                                        <img src="{{ asset('images/'. $post->id . '.jpeg') }}" class="img-thumbnail center-block" alt="Blog Post Thumbnail">
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p>
                                        in
                                        @foreach($post->categories as $cat)
                                        <a href="{{ route('category', ['cat'=>$cat->id]) }}">{{$cat->cat_name}}</a>
                                        @if($post->categories->count() > 1),@endif
                                        @endforeach
                                        <time>{{$post->created_at}}</time>
                                    </p>
                                    <h1>
                                        <a href="{{ route('post', ['post'=> $post->id]) }}">{{$post->po_title}}</a>
                                    </h1>
                                </div>
                            </div>
                        </article> <!-- /.blog-item -->
                    @endforeach
                        <div class="page-turn">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <nav>
                                        <ul class="pagination pagination-sm">
                                            @if(!$posts->onFirstPage())
                                            <li>
                                                <a href="{{$posts->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">Prev</span>
                                                </a>
                                            </li>
                                            @endif
                                                    @for($i =1; $i <= $posts->lastPage(); $i++ )
                                            <li class="{{$posts->currentPage() == $i? 'active': null}}"><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                                                    @endfor
                                                @if($posts->hasMorePages())
                                            <li>
                                                <a href="{{$posts->nextPageUrl()}}" aria-label="Next">
                                                    <span aria-hidden="true">Next</span>
                                                </a>
                                            </li>

                                                @endif
                                        </ul> <!-- /.pagination -->
                                    </nav>
                                </div>
                            </div>
                        </div> <!-- /.page-turn -->

                    </section>
                    <!-- end of blog-contents -->
                    @endsection
