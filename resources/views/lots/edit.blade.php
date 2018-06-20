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
                url: '/api/lots/'+{{$lot->id}},
                headers: {
                    "Authorization": "Bearer "+localStorage.getItem('token')
                },
            })
                .done(function (response) {
                    $("input[name=title]").val(response.title);
                    $("input[name=description]").val(response.description);
                    $("input[name=start_price]").val(response.start_price);
                    $("input[name=step]").val(response.step);
                    $("input[name=blitz]").val(response.blitz);
                });

            $('#lotsform').on('submit', function(e){
                e.preventDefault();
                $("#title").text("");
                $("#description").text("");
                $("#start_price").text("");
                $("#step").text("");
                $("#blitz").text("");
                $.ajax({
                    type: 'PUT',
                    dataType: 'json',
                    url: '/api/lots/'+{{$lot->id}},
                    headers: {
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    data: $('#lotsform').serialize()
                })
                    .done(function (response) {
                        window.location.href = "/";
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