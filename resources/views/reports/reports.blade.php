@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reports</div>

                    <div class="panel-body">
                        <a href="/reports/cert-attendance" target="_blank" class="btn btn-default">Print Certificate of Attendance</a>
                        <a href="/reports/cert-attendance-with-image" target="_blank" class="btn btn-default">Print Certificate of Attendance (Complete)</a>

                        <a href="/reports/cert-membership-associate" target="_blank" class="btn btn-default">Print Associate</a>
                        <a href="/reports/cert-membership-regular-1year" target="_blank" class="btn btn-default">Print Regular 1 year</a>
                        <a href="/reports/cert-membership-regular-3years" target="_blank" class="btn btn-default">Print Regulary 3 years</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
