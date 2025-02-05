@extends('layouts.dashboard')

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="widget">
        <header class="widget-header">
            <h4 class="widget-title">Complaints</h4>
        </header><!-- .widget-header -->
        <hr class="widget-separator">
        <div class="widget-body">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </div>
        @endif

            <div class="table-responsive">
                <table id="default-datatable" data-plugin="DataTable" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Complaints</th>
                            <th>Status</th>
                            <th>Date Logged</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th>#</th>
                            <th>Complaints</th>
                            <th>Status</th>
                            <th>Date Logged</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @if($complaints->count() > 0)
                        @foreach($complaints as $key => $complaint)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $complaint->description }}</td>
                            <td>
                                @if($complaint->assigned)
                                    <span class="text-success">Assigned</span>
                                @else
                                    <span class="text-warning">Pending</span>
                                @endif
                            </td>
                            <td>{{ $complaint->created_at->toDayDateTimeString() }}</td>
                            <td>
                                <a href="{{ route('reception.complaints.detail', ['id' => $complaint->id]) }}">View details</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr class="text-center text-danger">
                            <td colspan="5">There are currently no complaints records.</td>
                        </tr>
                    @endif
                        
                    </tbody>
                </table>
            </div>
        </div><!-- .widget-body -->
    </div><!-- .widget -->
</div><!-- END column -->
</div>
@endsection
