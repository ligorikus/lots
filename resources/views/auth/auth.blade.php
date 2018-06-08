<script>
    $.ajax({
        url: '/api/auth',
        headers: {
            "Authorization": "Bearer "+localStorage.getItem('token')
        }
    }).fail(function () {
        window.location.href = "/signin";
    });
</script>