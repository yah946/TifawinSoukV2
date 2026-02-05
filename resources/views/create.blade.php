<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Create Category</h1>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <input name="name" placeholder="Name"><br><br>
    <input name="emoji" placeholder="Emoji"><br><br>
    <textarea name="description" placeholder="Description"></textarea><br><br>

    <button>Save</button>
</form>

    
</body>
</html>