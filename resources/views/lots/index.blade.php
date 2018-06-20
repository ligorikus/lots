@extends('layouts.app')

@section('title', 'Lots')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <input class="" id="search" type="text" name="search" placeholder="Search: "/>
                    <button id="search-btn" class="btn btn-default" type="button">Search!</button>
                </div>
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
        $(document).ready(function(){
            function getLot(id, user, title, price, step, blitz, status)
            {
                return "<tr>" +
                    "<td>" + id + "</td>" +
                    "<td>" + title + "</td>" +
                    "<td>" +
                    "<a href='/user/"+user.id+"'>"+user.email+"</a>" +
                    "</td>" +
                    "<td>" + price + "</td>" +
                    "<td>" + step + "</td>" +
                    "<td>" + blitz + "</td>" +
                    "<td>" + status + "</td>" +
                    "<td>" +
                    "<a href='/lots/"+id+"'> <span class='glyphicon glyphicon-eye-open'></span> </a>" +
                    "</td>" +
                    "</tr>"
            }

            $.ajax({
                dataType: 'json',
                url: '/api/',
                headers: {
                    "Authorization": "Bearer "+localStorage.getItem('token')
                }
            }).done(function (lots) {
                if (lots.length === 0)
                {
                    $("#lots").append(
                        "<tr><td colspan=8 align='center' style='padding: 5px; font-size: 1.4em;'><b>Lots not found</b></td></tr>"
                    );
                    return;
                }
                $.each(lots, function (i, lot) {
                    $("#lots").append(
                        getLot(lot.id, lot.user, lot.title, lot.price.price, lot.step, lot.blitz, lot.status)
                    );
                })
            });

            $("#search-btn").on('click', function(e){
                $.ajax({
                    dataType: 'json',
                    url: '/api/lots/search',
                    headers: {
                        "Authorization": "Bearer "+localStorage.getItem('token')
                    },
                    data: $('#search').serialize()
                }).done(function (lots) {
                    for (var i = document.getElementById('lots').getElementsByTagName('tr').length-1; i; i--) {
                        document.getElementById('lots').deleteRow(i);
                    }
                    if (lots.length === 0)
                    {
                        $("#lots").append(
                            "<tr><td colspan=8 align='center' style='padding: 5px; font-size: 1.4em;'><b>Lots not found</b></td></tr>"
                        );
                        return;
                    }
                    $.each(lots, function (i, lot) {
                        $("#lots").append(
                            getLot(lot.id, lot.user, lot.title, lot.price.price, lot.step, lot.blitz, lot.status)
                        );
                    })
                });

            });
        });
    </script>
@endsection