@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        @include('partials.search', $search_data)

        <div class="col-md-12">
            {{ $registrations->links() }}
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    REGISTRATION
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>ADDRESS</th>
                            <th>COMPANY/UNIVERSITY</th>
                            <th>MOBILE #</th>
                            <th>EMAIL</th>
                            <th nowrap>OR #</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($registrations as $i => $registration)
                            <tr onclick="document.location = '{{ url("/$route/$registration->id/edit") }}'">
                                <td>{{ $registration->last_name }}, {{ $registration->first_name }} {{ $registration->middle_name }}</td>
                                <td>{{ $registration->address }}</td>
                                <td>{{ $registration->company_name }}</td>
                                <td>{{ $registration->mobile_number }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->or_number }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            {{ $registrations->links() }}
        </div>
    </div>


</div>
@endsection
