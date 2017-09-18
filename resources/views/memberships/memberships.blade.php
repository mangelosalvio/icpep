@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
    <div class="row">

        @if( Auth::check() )
            @include('partials.search',$search_data)
        @endif

        <div class="col-md-12">
            @if( isset($membership) )
            {!! Form::model($membership,[
            'url' => "/{$route}/{$membership->id}",
            'class' => 'form-horizontal',
            'method' => 'put'
            ]) !!}
                {!! Form::hidden('id',null,[
                    'v-model' => 'id'
                ]) !!}
            @else
                {!! Form::open([
                'url' => "/{$route}",
                'class' => 'form-horizontal'
                ]) !!}
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Membership</div>
                <div class="panel-body">

                    <fieldset>
                        <legend>Personal Information</legend>
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

                            <div class="col-sm-4 {{ $errors->has('first_name') ? 'has-error' : '' }}" >
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
                            {!! Form::label('present_address','Present Address', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('present_address', null, [
                                'class' => 'form-control',
                                'rows' => 3
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('permanent_address','Permanent Address', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('permanent_address', null, [
                                'class' => 'form-control',
                                'rows' => 3
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('region','Region', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('region') ? 'has-error' : '' }}" >
                                {!! Form::text('region', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>

                            {!! Form::label('religion','Religion', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('religion') ? 'has-error' : '' }}" >
                                {!! Form::text('religion', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('date_of_birth','Date of Birth', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('date_of_birth') ? 'has-error' : '' }}" >
                                {!! Form::text('date_of_birth', null, [
                                'class' => 'form-control has-error datepicker',
                                'readonly' => true
                                ]) !!}
                            </div>

                            {!! Form::label('civil_status','Civil Status', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('civil_status') ? 'has-error' : '' }}" >
                                {!! Form::text('civil_status', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('place_of_birth','Place of Birth', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('place_of_birth') ? 'has-error' : '' }}" >
                                {!! Form::text('place_of_birth', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>

                            {!! Form::label('gender','Gender', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <label class="radio-inline">
                                    {{ Form::radio('gender', 'M' ) }}
                                    Male
                                </label>
                                <label class="radio-inline">
                                    {{ Form::radio('gender', 'F') }}
                                    Female
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email','Email', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('email') ? 'has-error' : '' }}" >
                                {!! Form::text('email', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>

                            {!! Form::label('mobile_number','Mobile Number', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('mobile_number') ? 'has-error' : '' }}" >
                                {!! Form::text('mobile_number', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('home_number','Home Number', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('home_number') ? 'has-error' : '' }}" >
                                {!! Form::text('home_number', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>

                            {!! Form::label('business_number','Business Number', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('business_number') ? 'has-error' : '' }}" >
                                {!! Form::text('business_number', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Membership Information</legend>

                        <div class="form-group">
                            {!! Form::label('or_no','OR No.', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('or_no') ? 'has-error' : '' }}" >
                                {!! Form::text('or_no', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('payment_date','OR Date', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('payment_date') ? 'has-error' : '' }}" >
                                {!! Form::text('payment_date', '2017-02-23', [
                                'class' => 'form-control has-error datepicker',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('type_of_application','Type of Application', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-5">
                                <label class="radio">
                                    {{ Form::radio('type_of_application', 'N' ) }}
                                    New
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <label class="radio">
                                    {{ Form::radio('type_of_application', 'R') }}
                                    Renewal
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('type_of_member','Type of Application', [
                            'class' => 'col-sm-2 control-label'
                            ])  !!}
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="radio">
                                            {{ Form::radio('type_of_member','A') }}
                                            Associate (Non-CpE Grad.)
                                        </label>
                                        <label class="radio">
                                            {{ Form::radio('type_of_member','R') }}
                                            Regular (CpE Grad.)
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        @foreach($new_applications as $new_application)
                                            <label class="radio">
                                                {{ Form::radio('type_of_membership',$new_application->id) }}
                                                {{ $new_application->membership_desc }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                @foreach($renewal_applications as $renewal_application)
                                    <label class="radio">
                                        {{ Form::radio('type_of_membership',$renewal_application->id) }}
                                        {{ $renewal_application->membership_desc }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_name','Company Name', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-10 {{ $errors->has('company_name') ? 'has-error' : '' }}" >
                                {!! Form::text('company_name', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_address','Company Address', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-10 {{ $errors->has('company_address') ? 'has-error' : '' }}">
                                {!! Form::textarea('company_address', null, [
                                'class' => 'form-control',
                                'rows' => 3
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('position','Position', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('position') ? 'has-error' : '' }}" >
                                {!! Form::text('position', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>

                            {!! Form::label('specialization','Specialization', [
                            'class' => 'col-sm-2 control-label'
                            ]) !!}
                            <div class="col-sm-4 {{ $errors->has('specialization') ? 'has-error' : '' }}" >
                                {!! Form::text('specialization', null, [
                                'class' => 'form-control has-error',
                                ]) !!}
                            </div>
                        </div>


                    </fieldset>

                    <fieldset>
                        <legend>EDUCATIONAL ATTAINMENT</legend>
                        <div class="form-group">
                            <div class="col-sm-3">
                                {!! Form::select('type_of_education', $type_of_education, null, [
                                'class' => 'form-control',
                                'v-model' => 'education.type_of_education'
                                ]) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::text('degree',null, [
                                'class' => 'form-control',
                                'placeholder' => 'Degree',
                                'v-model' => 'education.degree'
                                ]) !!}
                            </div>

                            <div class="col-sm-2">
                                {!! Form::text('inclusive_date',null, [
                                'class' => 'form-control',
                                'placeholder' => 'Inclusive Date(Year)',
                                'v-model' => 'education.inclusive_date'
                                ]) !!}
                            </div>

                            <div class="col-sm-1">
                                <input type="button" value="Add" class="btn btn-default" @click="addEducation()"/>
                            </div>
                        </div>

                        <div class="form-group" v-for="educ in educations">
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-xs-1">
                                        <span class="glyphicon glyphicon-trash" style="cursor: pointer;" @click="removeEducation(educ)"></span>
                                    </div>
                                    <div class="col-xs-10">
                                        <input type="hidden" name="educations[id][]" v-model="educ.id" >
                                        <select name="educations[type_of_education][]"  v-model="educ.type_of_education" class="form-control">
                                            <option v-for="educ_type in type_of_education" :value="educ_type.id">@{{ educ_type.desc }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="educations[degree][]" class="form-control text-left" v-model="educ.degree">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="educations[inclusive_date][]" class="form-control text-left" v-model="educ.inclusive_date">
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>WORK ATTAINMENT</legend>
                        <div class="form-group">
                            <div class="col-sm-5">
                                {!! Form::text(null, null, [
                                'class' => 'form-control',
                                'v-model' => 'form_company.company',
                                'placeholder' => 'Company'
                                ]) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! Form::text(null,null, [
                                'class' => 'form-control',
                                'placeholder' => 'Position',
                                'v-model' => 'form_company.position'
                                ]) !!}
                            </div>

                            <div class="col-sm-2">
                                {!! Form::text('inclusive_date',null, [
                                'class' => 'form-control',
                                'placeholder' => 'Inclusive Date(Year)',
                                'v-model' => 'form_company.inclusive_date'
                                ]) !!}
                            </div>

                            <div class="col-sm-1">
                                <input type="button" value="Add" class="btn btn-default" @click="addCompany()"/>
                            </div>
                        </div>

                        <div class="form-group" v-for="company in companies">
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-xs-1">
                                        <span class="glyphicon glyphicon-trash" style="cursor: pointer;" @click="removeCompany(company)"></span>
                                    </div>
                                    <div class="col-xs-10">
                                        <input type="hidden" name="companies[id][]" v-model="company.id" >
                                        <input type="text" name="companies[company][]"  v-model="company.company" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="companies[position][]" class="form-control text-left" v-model="company.position">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="companies[inclusive_date][]" class="form-control text-left" v-model="company.inclusive_date">
                            </div>
                        </div>

                    </fieldset>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Save', [
                            'class' => 'btn btn-info form-control'
                            ]) !!}
                        </div>
                    </div>

                    @if( Auth::check() )
                        @if( isset($membership) )
                            @if( $membership->is_approved )
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <button name="action" class="btn btn-warning form-control" value="revert">Revert to Pending</button>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <button name="action" class="btn btn-primary form-control" value="approve">Approve</button>
                                    </div>
                                </div>

                            @endif
                        @endif
                    @endif
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@if ( isset($membership) )
    <script>window.id = {{ $membership->id  }};</script>
@endif
<script src="/js/memberships.js"></script>


@endsection
