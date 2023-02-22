<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            font-family: 'Nunito', sans-serif;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .btn-brown {
            background-color: #8B4513;
            color: #fff;
            border-color: #8B4513;
        }

        .btn-brown:hover {
            background-color: #A0522D;
            border-color: #A0522D;
        }
    </style>
</head>

<body>
    <div class="center">
        <img src="{{ asset('sayama.jpeg') }}" style="max-width:780px" class="img-fluid" alt="Image">
        <br>
        <a href="/login" class="btn btn-lg btn-brown"><small>Login</small></a>
    </div>
</body>

</html>
