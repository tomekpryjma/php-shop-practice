<?php

include_once __DIR__ . '/../auth_functions.php';
auth_check();

include __DIR__ . '/../inc/header.php';


?>
    <h1>Account</h1>
    <h3>Hi there <?php echo htmlspecialchars($_SESSION['auth']['email']); ?></h3>
    
<?php

include __DIR__ . '/../inc/footer.php';
