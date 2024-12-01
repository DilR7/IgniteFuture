<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $content->content_name }}</title>
</head>

<body>

    <h1>{{ $content->content_name }}</h1>
    <p>{{ $content->content_desc }}</p>

    <!-- Display Video -->
    <video width="100%" controls>
        <source src="{{ secure_asset($content->content_video) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

</body>

</html>
