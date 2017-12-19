@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Replies</h2>
                </div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('topics.index') }}"> Back</a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success clear">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="topic-content clear">
                    <strong>{{$topic->created_by_user->name}} Says:</strong>

                    <p>{!! $topic->content !!}</p>
                </div>
                <div class="reply-form">
                    {!! Form::open(array('route' => 'replies.store','method'=>'POST', 'id'=>'reply-form')) !!}
                    <input type="hidden" name="topic_id" value="{{$topic->id}}"/>
                    @include('replies.form')
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="replies clearfix col-md-12">
                <h3>All Comments</h3>
                @include('replies.list')
            </div>
        </div>
    </div>
@endsection

