<?php
$page_title = 'Application received';
$errorMessage = '';
$firstName = '';
$lastName = '';
$nationalId = '';
$phone = '';
$routeName = '';
$joiningDate = '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $page_title = 'Application not submitted';
    $errorMessage = 'Submit the membership form to apply.';
} else {
    $firstName = trim((string) ($_POST['first_name'] ?? ''));
    $lastName = trim((string) ($_POST['last_name'] ?? ''));
    $nationalId = trim((string) ($_POST['nationalID'] ?? ''));
    $phone = trim((string) ($_POST['phone'] ?? ''));
    $routeId = (string) ($_POST['route'] ?? '');
    $joiningDate = (string) ($_POST['joiningDate'] ?? '');
    $acceptRules = (string) ($_POST['acceptRules'] ?? '');

    if ($firstName === '' || $lastName === ''
        || !preg_match('/^[0-9]{7,8}$/', $nationalId)
        || !preg_match('/^(07|01)[0-9]{8}$/', $phone)
        || !in_array($routeId, ['1', '2', '3'], true)
        || $joiningDate === ''
        || $acceptRules !== 'yes'
    ) {
        $page_title = 'Application not submitted';
        $errorMessage = 'Check the form details and submit the application again.';
    } else {
        switch ($routeId) {
            case '1':
                $routeName = 'Kiserian';
                break;
            case '2':
                $routeName = 'Ngong';
                break;
            default:
                $routeName = 'Rongai';
        }
    }
}

include 'includes/header.php';
?>

<main>
    <?php if ($errorMessage !== ''): ?>
        <h2>Application not submitted</h2>
        <p class="status-message status-error" role="alert">
            <?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?>
        </p>
        <p><a href="register.php">Return to the membership form</a></p>
    <?php else: ?>
        <h2>Thank you, <?php echo htmlspecialchars($firstName . ' ' . $lastName, ENT_QUOTES, 'UTF-8'); ?></h2>
        <p>Your application for the <?php echo htmlspecialchars($routeName, ENT_QUOTES, 'UTF-8'); ?> route has been received.</p>
        <p>The office will call you on <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?> with the next steps.</p>
        <p><a href="index.php">Return to the home page</a></p>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>