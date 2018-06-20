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

            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('auth.auth')
    <script>
        $(document).ready(function(){
            $.ajax({
                dataType: 'json',
                url: '/api/lots/'+{{$lot->id}},
                headers: {
                    "Authorization": "Bearer "+localStorage.getItem('token')
                }
            }).done(function (lot) {
                console.log(lot);
            });
        });
    </script>
@endsection