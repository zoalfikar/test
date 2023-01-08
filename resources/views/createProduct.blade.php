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
    @if(isset($product))
        <form action="{{url('products/'.$product->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <label for="name">name</label> <input type="text" name="name" value="{{$product->name}}">
            <label for="unit_id">unit</label> 
            <select name="unit_id">
                @foreach($units as $unit)
                   <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
            </select>
            @if($productImage)
                <input type="hidden" name="imageId" value="{{$productImage->id}}">

                <label for="path">image path</label> 
                <input type="text" name="path" value="{{$productImage->path}}">

                <label for="description">image description</label> 
                <input type="text" name="description" value="{{$productImage->description}}">
            @endif
            <input type="submit" value="update">
        </form>
        <form action="{{url('products/'.$product->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="delete">
        </form>
    @else
        <form action="{{url('products')}}" method="post">
            @csrf
            <label for="name">name</label> <input type="text" name="name">
            <label for="unit_id">unit</label> 
            <select name="unit_id">
                @foreach($units as $unit)
                   <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="submit">
        </form>
    @endif
</body>
</html>