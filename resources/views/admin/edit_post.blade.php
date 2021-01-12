@extends('layouts.admin_layout')
@section('content')
@trixassets

                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-10 col-md-8">
                        <div class="card">
                            <div class="card-block">
                                <form enctype="multipart/form-data" class="form-horizontal form-material" action="{{ route('posts.update', ['post'=>$post->id]) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label class="col-md-12">Post Title</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Title" name="title" class="form-control form-control-line" value="{{ $post->po_title }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Post Content</label>
                                        <br>
                                        <div class="col-md-12">
                                            {!! $post->trix('po_content') !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Post Cover</label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" name="cover" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Post Categories</label>
                                        <select multiple name="categories[]">
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}" {{ $post->categories->contains($cat->id)?'selected':null }}>{{ $cat->cat_name }}</option>
                                            @endforeach
                                          </select>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Update Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
@endsection
