@extends('layouts.public_layout')
@section('content')
@trixassets
                        <!-- blog-contents -->
                    <section class="col-md-8">

                        <article class="single-blog-item">
                            <div class="alert alert-info">
                                @if($post->categories->count()>0)
                                @foreach($post->categories as $cat)
                                        <a href="{{ route('category', ['cat'=>$cat->id]) }}">{{$cat->cat_name}}</a>
                                        @if($post->categories->count() > 1),@endif
                                @endforeach
                                @else
                                    <p style="display: inline">UnCategoried</p>

                                @endif
                                updated
                                <time>{{ $post->updated_at }}</time>
                            </div>

                            <h1>{{ $post->po_title }}</h1>
                            {!! $post->po_content !!}
                        </article>

                        @if ($post->categories->count() > 0)
                        @if ($post->categories[0]->posts->count() > 1)

                        <h4>Related Articles</h4>
                        @endif
                        @foreach ($post->categories[0]->posts as $po)
                        @if($po->id != $post->id)
                        <div class="related-articles">
                            <div class="alert alert-info">
                                <a href="{{ route('post', ['post'=>$po->id]) }}">{{ $po->po_title }} </a>
                            </div>
                        </div>
                        @endif

                        @endforeach
                        @endif


                        <div class="author">
                            <p>Written by <strong class="text-capitalize">{{ $post->user->name }}</strong></p>
                        </div>
                        <div class="feedback">
                            <div class="row">
                                <div class="col-md-12">
                                    @unless ($post->comments)

                                    <h1>feedback</h1>
                                    @endunless
                                    @foreach($post->comments as $comment)
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <p class="comment-info">
                                                    <strong>{{ $comment->co_name }}</strong> <span>{{ $comment->created_at }}</span>
                                                </p>
                                                <p>
                                                    {{ $comment->co_text }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="comment-post">
                            <h1>post a comment</h1>
                            <form method="post" action="{{ route('comment') }}" >
                                @csrf
                                <input hidden value="{{ $post->id }}" name="id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control" id="email" required="required" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input name="website" type="url" class="form-control" id="subject" required="required" placeholder="Your Website">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Type here message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" required="required"> Please Check to Confirm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" id="submit" name="submit" class="btn btn-cmnt">post comment</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </section>
                    <!-- end of blog-contents -->
@endsection
