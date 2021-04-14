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
            <h1><a href="/posts/my-first-post">My First Post</a></h1>

            <p>
                The MVC framework is an architectural pattern that separates an application into three main logical components Model, View, and controller.
                This is done to separate internal representations of information from the ways information is presented to and accepted from the user.
            </p>

        </article>

        <article>
            <h1><a href="/posts/my-second-post">My Second Post</a></h1>

            <p>
                SSH keys are an authentication method used to gain access to an encrypted connection between systems and then ultimately use that connection to manage the remote system.
            </p>

        </article>

        <article>
            <h1><a href="/posts/my-third-post">My Third Post</a></h1>

            <p>
                Git is a software for tracking changes in any set of files, usually used for coordinating work among programmers collaboratively developing source code during software development.
            </p>

        </article>

    </body>
</html>
