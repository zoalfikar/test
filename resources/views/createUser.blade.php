<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: max-content;
            position: relative;
            margin: auto;
            margin-top:5rem;

        }
        form input , select {
            display: block;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
@if(isset($user))
        <form action="{{url('users/'.$user->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <label for="name">name</label> <input type="text" name="name"  value="{{$user->name}}">
            <label for="email">email</label> <input type="text" name="email"  value="{{$user->email}}">
            <label for="password">password</label> <input type="password" name="password"  value="{{$user->password}}">
            <input type="submit" value="submit">
        </form>
        <form action="{{url('users/'.$user->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="delete">
        </form>
    @else
        <form action="{{url('users')}}" method="post">
            @csrf
            <label for="name">name</label> <input type="text" name="name">
            <label for="email">email</label> <input type="text" name="email">
            <label for="password">password</label> <input type="password" name="password">
            <input type="submit" value="submit">
        </form>
    @endif
 
</body>
</html>