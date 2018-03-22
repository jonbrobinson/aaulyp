@extends('layouts.master')

@section('content')
    <div class="">
        <div class="page-content">
            <div class="col-md-8 col-md-offset-2">
                @if ($errors->get('token'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors->first('token') }}</li>
                        </ul>
                    </div>
                @elseif (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (isset($errorMessage))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errorMessage }}</li>
                        </ul>
                    </div>
                @endif

                @if (isset($successMessage))
                    <div class="alert alert-success">
                        {{ $successMessage }}
                    </div>
                @endif

                <form id='admin-form' action="{{ url('/token') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="admin" class="control-label sr-only">Admin Access</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary"><i class="fa loading-icon"></i> <span>Generate Token</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    @include('partials.footer')
@endsection