@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in {{Auth::user()->name}}! You can view new jobs by clicking the 'Jobs' tab to the
                    left. All your previous bids are saved in the 'History' section.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
