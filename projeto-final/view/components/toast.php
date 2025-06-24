<?php
$error = isset($_SESSION['toast_error']) ? $_SESSION['toast_error'] : null;
$success = isset($_SESSION['toast_success']) ? $_SESSION['toast_success'] : null;

unset($_SESSION['toast_error']);
unset($_SESSION['toast_success']);

if (isset($error) || isset($success)) {
?>
    <div class="toast <?= $success ? 'success' : 'error' ?>" role="alert">
        <?= $success ?? $error ?>
    </div>
<?php
}
?>

<style>
    .toast {
        padding: 15px 0;
        color: white;
        border-radius: 16px;
        width: 364px;
        font-size: 12px;
        font-weight: 600;
        text-align: center;
        position: absolute;
        bottom: 20px;
        margin: 0 auto;
        animation: slide-up 0.6s ease-out forwards;
        opacity: 0;
        transform: translate(-50%, 20px);
    }

    .container>.toast {
        left: 50%;
    }

    .left>.toast {
        left: 25%;
    }

    .error {
        background: linear-gradient(90deg, #FA6449, #FC5451, #FD147B);
    }

    .success {
        background: linear-gradient(90deg, #4CAF50, #66BB6A, #81C784);
    }

    @keyframes slide-up {
        to {
            opacity: 1;
            transform: translate(-50%, 0);
        }
    }
</style>