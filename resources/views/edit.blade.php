<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Edit Category</h1>

<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $category->name }}"><br><br>
    <input name="emoji" value="{{ $category->emoji }}"><br><br>
    <textarea name="description">{{ $category->description }}</textarea><br><br>

    <button>Update</button>
</form>


    
</body>
</html>