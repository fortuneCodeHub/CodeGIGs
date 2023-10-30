@php
    use App\Mail\EmailVerificationMail;
    $user = new EmailVerificationMail($_SESSION["formFields"]);
    $user = $user->user;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Bootstrap CSS  --}}
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href=" {{asset("icons/bootstrap-icons.css")}} ">

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            font-size: 17px;
            font-weight: 600;
        }
    </style>

</head>
<body class="bg-light">
    <div class="container">


        {{$slot}}

    </div>


    {{-- Bootstrap JS --}}
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
</body>
</html>
