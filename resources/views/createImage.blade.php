<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .options{
        display:flex;
        margin:auto;
        gap:2rem;
        width: max-content;
        margin-top:4rem;
    }
</style>
<body>
    <div class="options">
        <a href="{{url('/userImage')}}">user image</a>
        <a href="{{url('/productImage')}}">product image</a>
    </div>
</body>
</html>