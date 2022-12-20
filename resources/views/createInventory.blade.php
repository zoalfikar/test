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
    @if(isset($inventory))
        <form action="{{url('inventories/'.$inventory->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put" />
            <input type="text" name="product" value="{{$inventory->product->name}}">
            <label for="quantity">{{$inventory->product->units->name}}</label> <input type="number" name="quantity" step="0.01" value="{{$inventory->quantity}}">
            <input type="submit" value="update">
        </form>
        <form action="{{url('inventories/'.$inventory->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" value="delete">
        </form>
    @else
        <form action="{{url('inventories')}}" method="post">
            @csrf
            <label for="product_id">unit</label> 
            <select name="product_id">
                @foreach($products as $product)
                   <option value="{{$product->id}}">{{$product->name}} :::: {{$product->units->name}} </option>
                @endforeach
            </select>
            <label for="quantity">quantity</label> <input type="number" step="0.01" name="quantity">
            <input type="submit" value="submit">
        </form>
    @endif
</body>
</html>