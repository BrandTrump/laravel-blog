<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Blog</title>

        <link rel="stylesheet" href="/app.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>

    <body>

        <article>
            <h1><?= $post->title; ?></h1>

            <div>
                <?= $post->body; ?>
            </div>
        </article>

        <a href="/">Go Back</a>

    </body>
</html>
