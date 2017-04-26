<!--
    - In the top right corner of each post will be a link to the
    profile of the sender
    -
    - If the post was made to another user, then the top right corner will
    consist of (sender) to (recipient), both of which will be links leading
    back to the respective profile pages
    -
    - The javascript code that deletes posts based on the clicking of the button with the class 'delete-post-button' is dependent on the node structure of the html tags
    - If the structure is changed, the query selectors in src/js/ajax need to be changed to match
 -->
<?php foreach ($posts as $post): ?>

        <div class="post">
            <!-- Usernames in the top right corner -->
            <?php if ($post['sender_username'] != $post['recipient_username']): ?>
                <p class = "post-usernames">
                    <a href="profile.php?username=<?php echo $post['sender_username']; ?>"><?php echo $post['sender_username']; ?></a> to
                    <a href="profile.php?username=<?php echo $post['recipient_username']; ?>"><?php echo $post['recipient_username']; ?></a>
                </p>
            <?php else: ?>
                <p class = "post-usernames">
                    <a href="profile.php?username=<?php echo $post['sender_username']; ?>"><?php echo $post['sender_username']; ?></a>
                </p>
            <?php endif; ?>

            <?php if (!empty($post['title'])): ?>
                <img class="movie-poster" src="<?php echo $poster_url_method($post['title']); ?>" onerror="this.src = '../src/images/movie-poster-placeholder.png';" alt="no image" height="75px" width="50px">
            <?php endif; ?>

            <p class="post-body">
                <?php if (!empty($post['title'])): ?>
                    <a class="movie-link" href="../pages/title-page.php?username=<?php echo $_POST['username']; ?>&title=<?php echo $post['title']; ?>"><?php echo $post['title']; ?>
                    </a>
                    <br><br>
                <?php endif; ?>
                <?php echo $post['post_body']; ?>
            </p>

            <?php if ($post['sender_username'] == $_GET['username']): ?>
                <form class="delete-post-form" action="../logic/timeline.php?username=<?php echo $_SESSION['username']; ?>" method="post">
                    <input type="hidden" name="post-recipient" value="<?php echo $post['recipient_username'] ?>">
                    <input type="hidden" name="delete-post-id" value="<?php echo $post['post_id'] ?>">
                    <input class="delete-button" type="submit" name="delete-post" value="x">
                </form>
            <?php endif; ?>

            <h6 class="post-time"><?php echo substr($post['post_time'], 11, 5); ?></h6>
        </div>
<?php endforeach; ?>
