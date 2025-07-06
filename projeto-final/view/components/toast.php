<?php
$error = isset($_SESSION['toast_error']) ? $_SESSION['toast_error'] : null;
$success = isset($_SESSION['toast_success']) ? $_SESSION['toast_success'] : null;

unset($_SESSION['toast_error']);
unset($_SESSION['toast_success']);

if (isset($error) || isset($success)) {
?>
    <div class="toast toast-<?= $success ? 'success' : 'error' ?> show" role="alert">
        <div class="toast-content">
            <span class="material-symbols-outlined"><?= $success ? 'check_circle' : 'error' ?></span>
            <span><?= $success ?? $error ?></span>
        </div>
        <button class="toast-close">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
<?php
}
?>

<style>
    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        padding: var(--space-4);
        display: flex;
        align-items: center;
        gap: var(--space-3);
        transform: translateX(100%);
        transition: transform 0.3s ease;
        z-index: 1000;
        max-width: 400px;
        border: 1px solid var(--gray-100);
    }
    
    .toast.show {
        transform: translateX(0);
    }
    
    .toast-content {
        display: flex;
        align-items: center;
        gap: var(--space-2);
        flex: 1;
    }
    
    .toast-close {
        background: none;
        border: none;
        color: var(--gray-500);
        cursor: pointer;
        padding: var(--space-1);
        border-radius: var(--radius-sm);
        transition: all var(--transition-fast);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .toast-close:hover {
        background: var(--gray-100);
        color: var(--gray-700);
    }
    
    .toast-success {
        border-left: 4px solid var(--success-500);
    }
    
    .toast-error {
        border-left: 4px solid var(--danger-500);
    }
    
    .toast-info {
        border-left: 4px solid var(--primary-500);
    }

    .toast .material-symbols-outlined {
        font-size: var(--font-size-lg);
    }

    .toast-success .material-symbols-outlined:first-child {
        color: var(--success-500);
    }

    .toast-error .material-symbols-outlined:first-child {
        color: var(--danger-500);
    }

    .toast-info .material-symbols-outlined:first-child {
        color: var(--primary-500);
    }

    @media (max-width: 768px) {
        .toast {
            top: 10px;
            right: 10px;
            left: 10px;
            max-width: none;
            transform: translateY(-100%);
        }
        
        .toast.show {
            transform: translateY(0);
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toast = document.querySelector('.toast');
    if (toast) {
        const closeBtn = toast.querySelector('.toast-close');
        
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            });
        }
        
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 5000);
    }
});
</script>