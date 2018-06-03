@extends('layouts.app')

@section('title', 'Signin page')

@section('content')
    <div class="col-md-offset-4">
    </div>
    <div class="col-md-4">
        <form id="loginform">
            {{ csrf_field() }}
            <div class="row">
                <div class="col md-12 form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" required />
                </div>
                <div class="col md-12 form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" required  title="Password"/>
                </div>
                <div class="col-md-12 form-group">
                    <button class="btn btn-theme margintop10 pull-left" type="submit">Отправить</button>
                </div>

            </div>
        </form>
    </div>
    <div class="col-md-offset-4">
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#loginform').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '/api/login',
                    data: $('#loginform').serialize(),
                    success: function(result){
                        localStorage.setItem('token', result.access_token);
                    }
                });
            });
        });
    </script>
@endsection