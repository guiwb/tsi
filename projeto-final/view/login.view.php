<div class="login-container">
    <div class="login-card card">
        <div class="login-header">
            <div class="logo-section">
                <div class="logo-icon">🏊‍♂️</div>
                <h1 class="login-title">Natare</h1>
                <p class="login-subtitle">Sua plataforma de gestão de natação</p>
            </div>
        </div>

        <div class="login-body">
            <h2 class="welcome-title">Bem-vindo de volta!</h2>
            <p class="welcome-text">Faça login para acessar sua conta</p>

            <form method="POST" action="/login" class="login-form">
                <div class="input-group">
                    <span class="material-symbols-outlined icon">alternate_email</span>
                    <input type="email" id="email" placeholder="Digite seu e-mail" name="email" required>
                </div>

                <div class="input-group">
                    <span class="material-symbols-outlined icon">lock</span>
                    <input type="password" id="password" placeholder="Digite sua senha" name="password" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-lg login-btn">
                        <span class="material-symbols-outlined">login</span>
                        <span>Entrar</span>
                    </button>
                </div>
            </form>

            <div class="divider">
                <span>ou</span>
            </div>

            <div class="signup-section">
                <p class="signup-text">Não tem uma conta?</p>
                <a href="/signup" class="btn btn-secondary">
                    <span class="material-symbols-outlined">person_add</span>
                    <span>Criar conta</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: var(--space-6);
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        position: relative;
        overflow: hidden;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(30, 64, 175, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(147, 197, 253, 0.2) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .login-card {
        width: 100%;
        max-width: 450px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        z-index: 1;
        overflow: hidden;
    }

    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-500) 0%, var(--primary-600) 50%, var(--primary-700) 100%);
    }

    .login-header {
        padding: var(--space-8) var(--space-6) var(--space-6);
        text-align: center;
        background: linear-gradient(135deg, var(--primary-50) 0%, transparent 100%);
    }

    .logo-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--space-3);
    }

    .logo-icon {
        font-size: 4rem;
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .login-title {
        font-size: var(--font-size-4xl);
        font-weight: 700;
        margin: 0;
        background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-800) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .login-subtitle {
        font-size: var(--font-size-base);
        color: var(--gray-600);
        margin: 0;
        font-weight: 500;
    }

    .login-body {
        padding: var(--space-6);
    }

    .welcome-title {
        font-size: var(--font-size-2xl);
        font-weight: 600;
        color: var(--gray-800);
        margin: 0 0 var(--space-2) 0;
        text-align: center;
    }

    .welcome-text {
        font-size: var(--font-size-base);
        color: var(--gray-600);
        margin: 0 0 var(--space-6) 0;
        text-align: center;
    }

    .login-form {
        display: flex;
        flex-direction: column;
        gap: var(--space-6);
        margin-bottom: var(--space-8);
    }

    .input-group {
        position: relative;
        margin-bottom: 0;
    }

    .input-group input {
        width: 100%;
        padding: var(--space-5) var(--space-4) var(--space-5) var(--space-12);
        border: 2px solid var(--gray-200);
        border-radius: var(--radius-xl);
        font-size: var(--font-size-base);
        background: white;
        transition: all var(--transition-fast);
        font-family: var(--font-family);
        box-shadow: var(--shadow-sm);
    }

    .input-group input:focus {
        outline: none;
        border-color: var(--primary-400);
        box-shadow: 0 0 0 4px var(--primary-100), var(--shadow-md);
        transform: translateY(-2px);
    }

    .input-group .icon {
        position: absolute;
        left: var(--space-4);
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        transition: color var(--transition-fast);
        font-size: var(--font-size-xl);
    }

    .input-group input:focus + .icon {
        color: var(--primary-500);
    }

    .form-actions {
        margin-top: var(--space-6);
    }

    .login-btn {
        width: 100%;
        justify-content: center;
        padding: var(--space-5) var(--space-6);
        font-size: var(--font-size-lg);
        font-weight: 600;
        position: relative;
        overflow: hidden;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-md);
    }

    .login-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left var(--transition-slow);
    }

    .login-btn:hover::before {
        left: 100%;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .divider {
        display: flex;
        align-items: center;
        margin: var(--space-8) 0;
        color: var(--gray-500);
        font-size: var(--font-size-sm);
        font-weight: 500;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--gray-200);
    }

    .divider span {
        padding: 0 var(--space-6);
        background: white;
    }

    .signup-section {
        text-align: center;
    }

    .signup-text {
        font-size: var(--font-size-sm);
        color: var(--gray-600);
        margin: 0 0 var(--space-4) 0;
    }

    .signup-section .btn.btn-secondary {
        width: 100%;
        justify-content: center;
        padding: var(--space-3) var(--space-6);
        font-size: var(--font-size-sm);
        font-weight: 600;
        background: var(--gray-100) !important;
        color: var(--gray-700) !important;
        border: 2px solid var(--gray-200) !important;
        transition: all var(--transition-fast);
    }

    .signup-section .btn.btn-secondary:hover {
        background: var(--gray-200) !important;
        color: var(--gray-800) !important;
        border-color: var(--gray-300) !important;
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    @media (max-width: 480px) {
        .login-container {
            padding: var(--space-4);
        }
        
        .login-card {
            max-width: 100%;
        }
        
        .login-header {
            padding: var(--space-6) var(--space-4) var(--space-4);
        }
        
        .login-body {
            padding: var(--space-4);
        }
        
        .logo-icon {
            font-size: 3rem;
        }
        
        .login-title {
            font-size: var(--font-size-3xl);
        }
    }

    .login-btn.loading {
        pointer-events: none;
        opacity: 0.8;
    }

    .login-btn.loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        border: 2px solid transparent;
        border-top: 2px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.login-form');
    const submitBtn = form.querySelector('.login-btn');
    
    form.addEventListener('submit', function() {
        submitBtn.classList.add('loading');
        submitBtn.innerHTML = '<span>Entrando...</span>';
    });
    
    const inputs = form.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>