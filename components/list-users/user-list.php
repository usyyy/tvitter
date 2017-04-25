<?php foreach($all_users_info as $username => $username_info): ?>

        <li class="user-list-item">
            <!-- passing the username in the url -->
            <a class="username-link" href="profile.php?username=<?php echo $username ?>"><?php echo $username; ?></a>

            <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

            <p>
                <span>
                    <?php if (!empty($username_info['email'])): ?>
                        <?php echo $username_info['email'] . ' || '; ?>
                    <?php endif; ?>
                    <?php if (!empty($username_info['website'])): ?>
                        <?php echo $username_info['website']; ?>
                    <?php endif; ?>
                </span>

                <?php if (!empty($username_info['bio'])): ?>
                    <?php echo $username_info['bio']; ?>
                    <br>
                <?php endif; ?>

            </p>
        </li>

<?php endforeach; ?>
