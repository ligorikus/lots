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
                <div class="col-md-6">
                    <h2 id="title"></h2>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <h2><div id="price"></div></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>E-mail:</h4>
                        </div>
                        <div class="col-md-8">
                            <div id="email"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Description:</h4>
                        </div>
                        <div class="col-md-8">
                            <div id="description"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Step:</h4>
                        </div>
                        <div class="col-md-8">
                            <div id="step"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                       <button class="btn btn-success" id="bet-btn">
                           Make bet
                       </button>
                    </div>
                </div>
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
                $("#title").html(lot.title);
                $("#price").html(lot.price.price);
                $("#email").html(lot.user.email);
                $("#description").html(lot.description);
                $("#step").html(lot.step);
            });

            $("#bet-btn").on('click', function(e){
                $.ajax({
                    dataType: 'json',
                    url: '/api/lots/'+{{$lot->id}}+'/bet',
                    headers: {
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    data: {
                        'sum': parseInt($("#step").text()) + parseInt($("#price").text())
                    }
                }).done(function () {
                    $("#price").text(parseInt($("#step").text()) + parseInt($("#price").text()))
                });
            });
        });
    </script>
@endsection