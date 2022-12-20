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
        form input{
            display: block;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
    @if(isset($unit))
        <form action="{{url('units/'.$unit->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <label for="name">name</label> <input type="text" name="name" value="{{$unit->name}}">
            <label for="modifier">modifier</label> <input type="text" name="modifier" value="{{$unit->modifier}}">
            <input type="submit" value="update">
        </form>
        <form action="{{url('units/'.$unit->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="delete">
        </form>
    @else
        <form action="{{url('units')}}" method="post">
            @csrf
            <label for="name">name</label> <input type="text" name="name">
            <label for="modifier">modifier</label> <input type="text" name="modifier">
            <input type="submit" value="submit">
        </form>
    @endif
</body>
</html>