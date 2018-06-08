@extends('layouts.app')
@section('script')
    <script>
        localStorage.removeItem('token');
        window.location.href = "/signin";
    </script>
@endsection