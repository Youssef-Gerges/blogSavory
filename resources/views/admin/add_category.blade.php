@extends('layouts.admin_layout')
@section('content')
@trixassets

                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-10 col-md-8">
                        <div class="card">
                            <div class="card-block">
                                <form enctype="multipart/form-data" class="form-horizontal form-material" action="{{ route('categories.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Category name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Name" name="name" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Save Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
@endsection
