
@extends('layouts.admin_layout')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-block">
            <div class="table-responsive">
                <a href="{{ route('posts.create') }}">
                <button class="btn btn-block btn-primary">
                    Add Post
                </button>
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post Title</th>
                            <th>Publish Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $i => $post)

                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td><a href="{{ route('post', ['post'=> $post->id]) }}">{{ $post->po_title }}</a></td>
                            <td>{{ $post->created_at }}</td>

                            <td><a href="{{ route('posts.edit', ['post'=> $post->id]) }}"><button class="btn btn-info">Edit</button></a></td>

                            <td>
                                <form action="{{ route('posts.destroy', ['post'=> $post->id]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
