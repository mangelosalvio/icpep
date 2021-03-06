@extends('layouts.app')

@section('content')
<style type="text/css">
    .blue {
        color: #0000CC;
        font-weight: bold;
    }

    .red {
        color : #f20d0d;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <div class="row">
        @include('partials.search', $search_data)

        <div class="col-md-12">
            {{ $memberships->links() }}
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    MEMBERSHIPS
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
                            <th nowrap>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memberships as $i => $membership)
                            <tr onclick="document.location = '{{ url("/$route/$membership->id/edit") }}'">
                                <td>{{ $membership->last_name }}, {{ $membership->first_name }} {{ $membership->middle_name }}</td>
                                <td>{{ $membership->present_address }}</td>
                                <td>{{ $membership->company_name }}</td>
                                <td>{{ $membership->mobile_number }}</td>
                                <td>{{ $membership->email }}</td>
                                <td>{{ $membership->or_no }}</td>
                                <td class="{{ ( $membership->is_approved ) ? "blue" : "red" }}">{{ ( $membership->is_approved ) ? "Approved" : "Pending" }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            {{ $memberships->links() }}
        </div>
    </div>


</div>
@endsection
