<script>
    $.ajax({
        url: '/api/auth',
        headers: {
            "Authorization": "Bearer "+localStorage.getItem('token')
        }
    }).done(function (response) {
        $("#auth").append("<a href='/lots'>"+response.email+"</a>");
        $("#logout").append("<a href='/logout'>Logout</a>");
    }).fail(function () {
        window.location.href = "/signin";
    });
</script>