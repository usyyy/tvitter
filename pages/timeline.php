<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../src/css/header.css">
        <link rel="stylesheet" href="../src/css/center-page.css">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            ul {
                text-align: center;
            }

            p {
                font-size: 0.9em;
            }

            h2 {
                text-align: center;
            }

            .posts-section .post:not(:first-child) {
                margin-top: 3%;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
            }

            .post p.sender-username {
                margin : 0;
                padding: 0;
                display: inline-block;
                font-size: 0.7em;
                font-style: italic;
                float: right;
            }

            .post p.post-body {
                font-size: 0.9em;
                /*margin-top: -0.1%;*/
            }

            .post span {
                font-weight: bold;
            }
        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>
        <?php
            require_once __DIR__ . "/../logic/timeline.php";
        ?>

        <div class="container">

            <?php
                include_once '../components/headers/loggedin-header.php';
            ?>
            <br><br>

            <h2>Timeline</h2>

            <div class="posts-section">
                <?php
                    // individual posts
                    require_once __DIR__ . "/../components/timeline/posts.php";
                ?>
            </div>
        </div>
    </body>
</html>
