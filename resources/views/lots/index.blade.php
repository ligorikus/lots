@extends('layouts.app')

@section('title', 'Lots')

@section('header')
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div id="lots"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajax({
            url: '/api/lots',
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token')
            },
            success: function(result){

            }
        })
    </script>
@endsection