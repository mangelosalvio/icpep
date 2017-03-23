@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('partials.search',$search_data)

        <div class="col-md-12">
            @if( isset($registration) )
            {!! Form::model($registration,[
            'url' => "/{$route}/{$registration->id}",
            'class' => 'form-horizontal',
            'method' => 'put'
            ]) !!}
            @else
                {!! Form::open([
                'url' => "/{$route}",
                'class' => 'form-horizontal'
                ]) !!}
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Registration</div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('name','Name', [
                            'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-3 {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            {!! Form::text('last_name', null, [
                                'class' => 'form-control ',
                                'placeholder' => 'Last Name'
                            ]) !!}
                            <span class="help-block has-error">{{ $errors->first('last_name') }}</span>
                        </div>

                        <div class="col-sm-3 {{ $errors->has('first_name') ? 'has-error' : '' }}" >
                            {!! Form::text('first_name', null, [
                            'class' => 'form-control',
                            'placeholder' => 'First Name'
                            ]) !!}
                            <span class="help-block has-error">{{ $errors->first('last_name') }}</span>
                        </div>

                        <div class="col-sm-3 {{ $errors->has('middle_name') ? 'has-error' : '' }}" >
                            {!! Form::text('middle_name', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Middle Name'
                            ]) !!}
                            <span class="help-block has-error">{{ $errors->first('middle_name') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address','Address', [
                        'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-9">
                            {!! Form::textarea('address', null, [
                            'class' => 'form-control',
                            'rows' => 3
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('name','Company/University', [
                        'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-9 {{ $errors->has('company_name') ? 'has-error' : '' }}" >
                            {!! Form::text('company_name', null, [
                            'class' => 'form-control has-error',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('company_address','Company/University Address', [
                        'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-9">
                            {!! Form::textarea('company_address', null, [
                            'class' => 'form-control',
                            'rows' => 3
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('mobile_number','Mobile #', [
                        'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-9">
                            {!! Form::text('mobile_number', null, [
                            'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','Email', [
                        'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-9">
                            {!! Form::text('email', null, [
                            'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('type_of_participant') ? 'has-error' : '' }}">
                        {!! Form::label('type_of_participant','Type of Participant', [
                        'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                    {{ Form::radio('type_of_participant', 'S' ) }}
                                    Student
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    {{ Form::radio('type_of_participant', 'P') }}
                                    Professional
                                </label>
                            </div>
                        </div>
                    </div>


                    <fieldset>
                        <legend>Payment Details</legend><div class="form-group">
                            {!! Form::label('or_number','OR Number', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-9">
                                {!! Form::text('or_number', null, [
                                'class' => 'form-control',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('or_date','OR Date', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-9">
                                {!! Form::text('or_date', '2017-02-23', [
                                'class' => 'form-control',
                                ]) !!}
                            </div>
                        </div>
                    </fieldset>



                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            {!! Form::submit('Save', [
                            'class' => 'btn btn-primary'
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>


</div>
@endsection
