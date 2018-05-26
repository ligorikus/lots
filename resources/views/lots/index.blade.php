@extends('layouts.app')

@section('title', 'Lots')

@section('content')
    <div class="col-md-12" id="lots-list">
        <lots
                v-if="lots.length > 0"
                v-for="lot in lots"
                v-bind:key="lot.id"
                v-bind:title="lot.title"
        ></lots>
    </div>
@endsection

@section('script')
    <script>
        axios.get('/api/lots?token=' +
            'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb3RzLmxvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNTI2OTk4MDE4LCJleHAiOjE1MjcwMDE2MTgsIm5iZiI6MTUyNjk5ODAxOCwianRpIjoiR0VzUGQxV0w1TTlNdnphUSIsInN1YiI6MywicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.2hCpNexIr8mgAcHGrfyI2Qmp5fNbsP3l2sm1_rvXzfs')
            .then((response) => this.data  = response.data)
            .catch((error) => console.log(error.response.data));
        new Vue({
            el: '#lots-list',
            data: {
                lots: this.data
            }
        });
        Vue.component('lots', {
            props: ['title'],
            template: '<h3></h3>'
        })


    </script>
@endsection