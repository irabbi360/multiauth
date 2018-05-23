@extends('layouts.app')

@section('content')

<!-- @if (Auth::user()->admin != 1)
    <div class="panel-body">

                   <script>
    window.location = '/home';
</script>
                </div>

@else -->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- @endif -->
@endsection
