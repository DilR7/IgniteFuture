<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->book_name }}</title>
</head>

<body>

    <h1>{{ $book->book_name }}</h1>
    <p>{{ $book->book_desc }}</p>

    <iframe src="{{ secure_asset($book->book_content) }}" width="100%" height="600px"></iframe>

</body>

</html>
