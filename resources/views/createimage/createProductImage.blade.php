<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align:center;
        }
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
    <h1> product image</h1>
    <form action="{{url('images')}}" method="post">
            @csrf
            <input type="hidden" name="o_type" value="product">
            <label for="o_id">product</label> 
            <select name="o_id">
                @foreach($products as $product)
                   <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
            <label for="path">path</label> 
            <input type="text" name="path">

            <label for="description">description</label> 
            <input type="text" name="description">

            <input type="submit" value="submit">
        </form></body>
</html>