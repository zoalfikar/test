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
        <form action="{{url('users')}}" method="post">
            @csrf
            <label for="name">name</label> <input type="text" name="name">
            <label for="email">email</label> <input type="text" name="email">
            <label for="password">password</label> <input type="password" name="password">
            </select>
            <input type="submit" value="submit">
        </form>
</body>
</html>