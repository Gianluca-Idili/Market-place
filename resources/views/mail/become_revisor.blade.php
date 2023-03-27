<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>

<body>
    <h1>{{ $user->name }}</h1>

    Il seguente messaggio è stato inviato da un utente che vuole diventare revisore: <br>
     <strong>{{ $_GET['exampleInputPassword1'] }}</strong> <br>

    <a href="{{ route('make.revisor', compact('user')) }}">Rendi revisore</a>
</body>

</html>
