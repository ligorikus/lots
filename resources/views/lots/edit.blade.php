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
                @include('lots._form')
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('auth.auth')
    <script>
        $(document).ready(function(){
            $.ajax({
                //TODO: url id
                url: '/api/lots/',
                headers: {
                    "Authorization": "Bearer "+localStorage.getItem('token')
                },
            })
                .done(function (result) {

                });

            $('#lotsform').on('submit', function(e){
                e.preventDefault();
                $("#title").text("");
                $("#description").text("");
                $("#start_price").text("");
                $("#step").text("");
                $("#blitz").text("");
                $.ajax({
                    type: 'POST',
                    url: '/api/lots/',
                    headers: {
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    data: $('#lotsform').serialize()
                })
                    .done(function () {

                    })
                    .fail(function(request){
                        errors = request.responseJSON.errors;
                        $("#title").text(errors.title);
                        $("#description").text(errors.description);
                        $("#start_price").text(errors.start_price);
                        $("#step").text(errors.step);
                        $("#blitz").text(errors.blitz);
                    });
            });
        });
    </script>
@endsection