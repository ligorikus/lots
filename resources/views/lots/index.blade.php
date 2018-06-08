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
                <table id="lots" class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Price</th>
                        <th>Step</th>
                        <th>Blitz</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('auth.auth')
    <script>
        function getLot(id, user, title, price, step, blitz, status)
        {
            return "<tr>" +
                    "<td>" + id + "</td>" +
                    "<td>" + title + "</td>" +
                    "<td>" + user + "</td>" +
                    "<td>" + price + "</td>" +
                    "<td>" + step + "</td>" +
                    "<td>" + blitz + "</td>" +
                    "<td>" + status + "</td>" +
                    "<td><a href='/lots/edit/"+id+"'><span class='glyphicon glyphicon-pencil'></span></a></td>" +
                   "</tr>"
        }

        $.ajax({
            dataType: 'json',
            url: '/api/',
            headers: {
                "Authorization": "Bearer "+localStorage.getItem('token')
            }
        }).done(function (lots) {
            $.each(lots, function (i, lot) {
                $("#lots").append(
                    getLot(lot.id, lot.user.email, lot.title, lot.price.price, lot.step, lot.blitz, lot.status)
                );
            })
        });
    </script>
@endsection