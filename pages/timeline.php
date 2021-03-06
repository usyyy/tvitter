<?php require_once '../header.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../vendor/components/jquery/jquery.min.js"></script>
        <script src="../src/js/ajax/navigation.js"></script>
        <script src="../src/js/ajax/timeline.js"></script>
        <link rel="stylesheet" href="../src/sass/main.min.css">
        <title>Tvitter</title>
    </head>
    <body>
        <?php require_once __DIR__ . "/../logic/timeline.php"; ?>

        <div class="container-fluid">

            <?php require_once 'components/navigation/navigation-links.php'; ?>

            <h2 id="timeline-header">
                Timeline
            </h2>

            <form class="form-group search-posts" action="timeline.php?username=<?php echo $_SESSION['username']; ?>" method="post">
                <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
                <input class="form-control" type="text" name="search-input" value = "<?php echo isset($_POST['search-input']) ? $_POST['search-input'] : '' ?>" placeholder="e.g. game of thrones">
            </form>

            <?php require_once "components/timeline/posts.php"; ?>

        </div>
    </body>
</html>
