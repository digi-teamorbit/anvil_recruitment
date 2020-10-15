@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">jobinquiry {{ $jobinquiry->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/admin/jobinquiry') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $jobinquiry->id }}</td>
                            </tr>
                            <tr><th> job title </th><td> {{ $jobinquiry->job_title }} </td></tr>
                            <tr><th> Name </th><td> {{ $jobinquiry->name }} </td></tr>
                            <tr><th> Phone </th><td> {{ $jobinquiry->phone }} </td></tr><tr><th> LookingFor </th><td> {{ $jobinquiry->lookingFor }} </td></tr>
                            <tr><th> TIME </th><td> {{ $jobinquiry->Time }} </td></tr>
                           <tr><th> CV </th> <td> <a class="btn btn-success pull-right" href="{{asset($jobinquiry->file)}}" download >Downloadable
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i></a> </td></tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

