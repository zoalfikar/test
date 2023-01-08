<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        form{
            width: max-content;
            position: relative;
            margin: auto;
            margin-top:5rem;

        }
        form input  {
            display: block;
            margin-bottom:20px;
        }
    .options{
        display:flex;
        margin:auto;
        gap:2rem;
        width: max-content;
        margin-top:4rem;
    }
</style>
<body>
@if(isset($image))
        <form action="{{url('images/'.$image->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <center><h3>{{$image->owner->name}}</h3></center>
            <label for="path">path</label> 
            <input type="text" name="path" value ="{{$image->path}}">

            <label for="description">description</label> 
            <input type="text" name="description" value ="{{$image->description}}">

            <input type="submit" value="update">
        </form>
        <form action="{{url('images/'.$image->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="delete">
        </form>
    @else
        <div class="options">
            <a href="{{url('/images/create/user-image')}}">user image</a>
            <a href="{{url('/images/create/product-image')}}">product image</a>
        </div>
    @endif

</body>
</html>