<div class="auth-card">
    <div class="auth-header">
        <div class="logo-section">
            <div class="logo-icon">🏊‍♂️</div>
            <h1 class="auth-title">Natare</h1>
            <p class="auth-subtitle">Crie sua conta na plataforma</p>
        </div>
    </div>

    <div class="auth-body">
        <h2 class="welcome-title">Junte-se a nós!</h2>
        <p class="welcome-text">Preencha os dados abaixo para criar sua conta</p>

        <form method="POST" action="/signup" class="auth-form">
            <div class="input-group">
                <span class="material-symbols-outlined icon">person</span>
                <input type="text" id="name" placeholder="Nome completo" name="name" required>
            </div>

            <div class="input-group">
                <span class="material-symbols-outlined icon">alternate_email</span>
                <input type="email" id="email" placeholder="E-mail" name="email" required>
            </div>

            <div class="input-group">
                <span class="material-symbols-outlined icon">password</span>
                <input type="password" id="password" placeholder="Senha" name="password" required>
            </div>

            <div class="input-group">
                <span class="material-symbols-outlined icon">password</span>
                <input type="password" id="confirm_password" placeholder="Confirme a senha" name="confirm_password" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-lg auth-btn">
                    <span class="material-symbols-outlined">person_add</span>
                    <span>Criar conta</span>
                </button>
            </div>
        </form>

        <div class="divider">
            <span>ou</span>
        </div>

        <div class="auth-section">
            <p class="auth-text">Já tem uma conta?</p>
            <a href="/login" class="btn btn-secondary">
                <span class="material-symbols-outlined">login</span>
                <span>Fazer login</span>
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
        submitBtn.innerHTML = '<span>Criando conta...</span>';
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