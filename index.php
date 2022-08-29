<?php

include __DIR__ . '/inc/header.php';

?>
    <?php if ( ! isset($_SESSION['auth']) ): ?>

        <?php if ( isset($_SESSION['errors']['mismatch']) ): ?>
            <strong><?php echo get_validation_error($_SESSION['errors']['mismatch']); ?></strong>
        <?php endif; ?>

        <form action="login.php" method="post">
            <div>
                <label for="email">Email</label><br>
                <input type="text" name="email" placeholder="Email">

                <?php if ( isset($_SESSION['errors']['email']) ): ?>
                    <?php echo get_validation_error($_SESSION['errors']['email']); ?>
                <?php endif; ?>
            </div>

            <br>
            
            <div>
                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="Password">

                <?php if ( isset($_SESSION['errors']['password']) ): ?>
                    <?php echo get_validation_error($_SESSION['errors']['password']); ?>
                <?php endif; ?>
            </div>
            
            <br>
            <button type="submit">Login</button>
        </form>
    <?php else: ?>
        <strong>Welcome back!</strong>
        <ul>
            <li><a href="locked/account.php">Your account</a></li>
        </ul>
    <?php endif; ?>

<?php

include __DIR__ . '/inc/footer.php';
