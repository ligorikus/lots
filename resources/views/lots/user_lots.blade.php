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
            <div class="col-md-6"></div>
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <a href="lots/create"><div class="btn btn-success" style="margin: 5px">Create lot</div></a>
            </div>
        </div>
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
            "<td>" +
            "<a href='/lots/"+id+"'> <span class='glyphicon glyphicon-eye-open'></span> </a>" +
            "<a href='/lots/"+id+"/edit'><span class='glyphicon glyphicon-pencil'></span> </a>" +
            "</td>" +
            "</tr>"
    }

    $.ajax({
        dataType: 'json',
        url: '/api/lots/',
        headers: {
            "Authorization": "Bearer "+localStorage.getItem('token')
        }
    }).done(function (lots) {
        if (lots.length === 0)
        {
            $("#lots").append(
                "<td colspan=8 align='center' style='padding: 5px; font-size: 1.4em;'><b>Lots not found</b></td>"
            );
            return;
        }
        $.each(lots, function (i, lot) {
            $("#lots").append(
                getLot(lot.id, lot.user.email, lot.title, lot.price.price, lot.step, lot.blitz, lot.status)
            );
        })
    });
</script>
@endsection