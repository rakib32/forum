@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="pull-left">
                    <h2>Edit Topic</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('topics.index') }}"> Back</a>
                </div>


                @if (count($errors) > 0)
                    <div class="alert alert-danger clear">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::model($topic, ['method' => 'PATCH','route' => ['topics.update', $topic->id]]) !!}
                    @include('topics.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection