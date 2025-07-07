<div class="auth-card">
    <div class="auth-header">
        <div class="logo-section">
            <div class="logo-icon">🏊‍♂️</div>
            <h1 class="auth-title">Natare</h1>
            <p class="auth-subtitle">Sua plataforma de gestão de natação</p>
        </div>
    </div>

    <div class="auth-body">
        <h2 class="welcome-title">Bem-vindo de volta!</h2>
        <p class="welcome-text">Faça login para acessar sua conta</p>

        <form method="POST" action="/login" class="auth-form">
            <div class="input-group">
                <span class="material-symbols-outlined icon">alternate_email</span>
                <input type="email" id="email" placeholder="Digite seu e-mail" name="email" required>
            </div>

            <div class="input-group">
                <span class="material-symbols-outlined icon">lock</span>
                <input type="password" id="password" placeholder="Digite sua senha" name="password" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg auth-btn">
                    <span class="material-symbols-outlined">login</span>
                    <span>Entrar</span>
                </button>
            </div>
        </form>

        <div class="divider">
            <span>ou</span>
        </div>

        <div class="auth-section">
            <p class="auth-text">Não tem uma conta?</p>
            <a href="/signup" class="btn btn-secondary">
                <span class="material-symbols-outlined">person_add</span>
                <span>Criar conta</span>
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.auth-form');
    const submitBtn = form.querySelector('.auth-btn');
    
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