@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div>
                            @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                            @endif
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                40% Update complete (success)
                            </div>
                        </div>
                        <form method="post" action="{{ route('fileUpgrading') }}">
                            {{ csrf_field() }}
                            <input type="submit" value="Update Now" class="btn btn-primary">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
