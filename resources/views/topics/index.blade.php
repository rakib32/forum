@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Topics</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('topics.create') }}"> Create New Topic</a>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success clear">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="topics clearfix col-md-12">
                <div class="col-md-4 category-select-cont">
                    <select class="form-control m-bot15 select-category" name="category_id">
                        <option value="0">All Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="topic-table">
                    @include('topics.table')
                </div>
            </div>


        </div>
    </div>
@endsection

