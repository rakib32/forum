<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Comment:</strong>
            {!! Form::textarea('content', null, array('placeholder' => 'Comment','class' => 'form-control reply-content','style'=>'height:150px')) !!}
        </div>
        <button type="submit" class="btn btn-primary">Reply</button>
    </div>

</div>