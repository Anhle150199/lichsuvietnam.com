<form action="test" method="POST">
    <input name="username" type="text">
    <input name="password" type="password">
    <input value="Submit" type="submit">
</form>
<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                // other AJAX settings goes here
                // ..
            }).done(function(response) {
                // Process the response here
            });
            event.preventDefault(); // <- avoid reloading
        });
    });
</script>