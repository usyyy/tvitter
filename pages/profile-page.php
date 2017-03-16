<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../src/css/header.css">
        <link rel="stylesheet" href="../src/css/center-page.css">
        <style media="screen">
            * {
                /*border: 1px solid black;*/
            }

            ul {
                text-align: center;
            }

            #welcome {
                text-align: center;
            }

            #welcome span {
                color: rgb(97, 242, 61);
            }

            .profile-image {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 3px solid black;
                display: block;
                margin: 0 auto;
                margin-bottom: 2%;
            }

            .profile-bio {
                width: 75%;
                display: block;
                margin: 0 auto;
            }

            .profile-bio p {
                padding: 0;
                margin: 0;
                font-size: 1,1em;
                text-align: center;
                color: red;
            }

            #post-message {
                text-align: center;
            }

            #post-message input[type="submit"] {
                display: block;
                margin: 0 auto;
            }

            #timeline-header {
                text-align: center;
            }

            .posts-section .post:not(:first-child) {
                margin-top: 1%;
            }

            .posts-section .post {
                border: 1px solid black;
                padding: 0 2%;
                background: rgb(209, 209, 209);
            }

            .post p {
                font-size: 0.9em;
            }

        </style>
        <meta charset="utf-8">
        <title>Registration Page</title>
    </head>
    <body>

        <div class="container">

            <?php
                include_once '../components/headers/loggedin-header.php';
            ?>

            <?php session_start(); ?>
            <?php
                // Using "X" as a dummy variable, reason can be seen in the get_user_bio method in the SqlHelper Class
                // If the user comes from the 'log in' page, then $_SESSION is used
                // If the user comes from the 'Users' paege, then $_GET is used
                $username = isset($_GET['username']) ? $_GET['username']: $_SESSION['username'];
            ?>
            <h4 id="welcome">Welcome <span><?php echo $username ?></span></h4>

            <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

            <div class="profile-bio">
                <p>
                    <?php require_once __DIR__ . "/../includes/sql-helper.inc.php";

                    // TODO: Move this code into an include file to maintain structure 
                    $sql_helper = new SqlHelper();

                    $bio = $sql_helper->get_user_bio($username);

                    echo $bio;
                    ?>

                </p>
            </div>

            <br>

            <form id="post-message" action="../logic/posts-logic.php" method="post">
                <textarea name="post-message" rows="4" cols="50"></textarea>
                <input type="submit" name="post-message-submit" value="tveet">
            </form>

            <h2 id="timeline-header">Timeline</h2>

            <div class="posts-section">
                <div class="post">
                    <h4>Post 1</h4>
                    <p>Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
                <div class="post">
                    <h4>Post 2</h4>
                    <p>Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
                <div class="post">
                    <h4>Post 3</h4>
                    <p>Non dolore proident duis officia excepteur labore ut eiusmod aliquip ipsum deserunt. Officia esse aute officia incididunt non aliqua cillum.</p>
                </div>
            </div>
        </div>
    </body>
</html>
