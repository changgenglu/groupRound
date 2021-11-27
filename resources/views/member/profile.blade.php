<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>member profile</title>
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('style/css/customForAll.css')}}">
</head>
<body>
    <h1>{{ $LoggedUserInfo->userNickName }}</h1>
    <br>
    <h1>{{ $LoggedUserInfo->userEmail }}</h1>
    <br>
    <a href="logout">logout</a>
    <br>

</body>
</html>