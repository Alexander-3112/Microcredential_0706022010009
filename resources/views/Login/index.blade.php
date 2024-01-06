<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form id="loginForm">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loginForm').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/login',
                    type: 'POST',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    },
                    success: function (response) {
                        console.log(response);
                        // Handle success, redirect or display a message
                    },
                    error: function (error) {
                        console.log(error.responseJSON);
                        // Handle error, display an error message
                    }
                });
            });
        });
    </script>
</body>
</html>
