@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Job Board</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <input type="text" class="form-control input-sm m-b-md" id="filter"
                               placeholder="Search in table">
                        <table id="sortableTable" class="footable table table-stripped toggle-arrow-tiny"
                               data-page-size="8" data-filter=#filter>
                            <thead>
                            <tr>

                                <th data-toggle="true">Client</th>
                                <th>Size</th>
                                <th>Moving From</th>
                                <th>Moving To</th>
                                <th>Expected Date</th>
                                <th>Posted Date</th>
                                <th data-hide="all">Further Details</th>
                                <th data-hide="all">Bids</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($query as $job)

                                <tr>
                                    <td>@if($job->quote_id == $job->act_id && $job->user_id == Auth::user()->id)
                                            <button class="btn btn-success btn-circle" type="button"><i
                                                        class="fa fa-check"></i></button>
                                        @else
                                            <button class="btn btn-warning btn-circle" type="button"><i
                                                        class="fa fa-list"></i></button>
                                        @endif
                                        {{$job->xBuilder}}
                                    </td>
                                    <td>{{$job->survey_cubic_move}}</td>
                                    <td>{{$job->xMoveZip}}</td>
                                    <td>{{$job->xSite}}</td>
                                    <td>{{$job->expected_date}}</td>
                                    <td>{{$job->posted_date}} by {{$job->user_rep}}</td>


                                    <td>
                                        <form action="postjob" method="post">

                                            <input type="hidden" name="quote_id" value="{{$job->act_id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                            @if($job->quote_id == $job->act_id && $job->user_id == Auth::user()->id)
                                                <input type="hidden" name="id" value="{{$job->bid_id}}"/>
                                            @else
                                                <input type="hidden" name="id" value=""/>
                                            @endif


                                            @if($job->quote_id == $job->act_id && $job->user_id == Auth::user()->id)
                                                <label>Job Comments</label><textarea name="text" class="form-control"
                                                                                     rows="5"
                                                                                     id="comment">{{$job->text}}</textarea>
                                            @else
                                                <label>Job Comments</label><textarea name="text" class="form-control"
                                                                                     rows="5"
                                                                                     id="comment">Please Enter Notes Here</textarea>
                                            @endif

                                            <br>
                                            <label>Price</label>
                                            <div class="input-group m-b"><span class="input-group-addon">&pound;</span>
                                                @if($job->quote_id == $job->act_id && $job->user_id == Auth::user()->id)
                                                    <input name="price" type="text"
                                                           class="form-control"
                                                           value="{{$job->price}}">
                                                @else
                                                    <input name="price" type="text"
                                                           class="form-control"
                                                           placeholder="0.00">
                                                @endif
                                            </div>

                                            <br>

                                            <div class="input-group m-b">
                                                @if($job->quote_id == $job->act_id && $job->user_id == Auth::user()->id)

                                                    <label>Payment Terms</label><select class="form-control"
                                                                                        name="terms">
                                                        <option selected
                                                                value="{{$job->terms}}">{{$job->terms}}</option>
                                                        <option disabled value="">---</option>
                                                        <option value="60 Days">60 Day</option>
                                                        <option value="On Move Day">On Move Day</option>
                                                    </select>

                                                @else
                                                    <label>Payment Terms</label><select class="form-control"
                                                                                        name="terms">
                                                        <option value="60 Days">60 Day</option>
                                                        <option value="On Move Day">On Move Day</option>
                                                    </select>
                                                @endif
                                            </div>

                                            <br>

                                            @if($job->quote_id == $job->act_id && $job->user_id == Auth::user()->id)
                                                <button class="form-control btn btn-danger" type="submit">Update Rate
                                                </button>
                                            @else
                                                <button class="form-control btn btn-primary" type="submit">Submit Rate
                                                </button>
                                            @endif
                                            <br>
                                        </form>
                                    </td>


                                    <td>
                                        <ul>
                                        @foreach($bids as $bid)
                                                @if($job->quote_id == $bid->quote_id)
                                                    <li>&pound;{{$bid->price}}</li>
                                        @endif
                                        @endforeach
                                        </ul>
                                    </td>


                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

