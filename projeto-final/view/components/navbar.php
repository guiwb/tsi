<?php
$uri = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar">
    <div class="navbar-left">
        <div class="logo">
            <a href="/" class="logo-link">
                <span class="logo-icon">🏊‍♂️</span>
                <span class="logo-text">Natare</span>
            </a>
        </div>

        <ul class="nav-menu">
            <li class="nav-item <?php if ($uri == '/') echo 'active' ?>">
                <a href="/" class="nav-link">
                    <span class="material-symbols-outlined">home</span>
                    <span>Início</span>
                </a>
            </li>
            <li class="nav-item <?php if (str_starts_with($uri, '/equipes')) echo 'active' ?>">
                <a href="/equipes" class="nav-link">
                    <span class="material-symbols-outlined">groups</span>
                    <span>Equipes</span>
                </a>
            </li>
            <li class="nav-item <?php if (str_starts_with($uri, '/treinos')) echo 'active' ?>">
                <a href="/treinos" class="nav-link">
                    <span class="material-symbols-outlined">fitness_center</span>
                    <span>Treinos</span>
                </a>
            </li>
            <li class="nav-item <?php if (str_starts_with($uri, '/usuarios')) echo 'active' ?>">
                <a href="/usuarios" class="nav-link">
                    <span class="material-symbols-outlined">people</span>
                    <span>Usuários</span>
                </a>
            </li>
            <li class="nav-item <?php if (str_starts_with($uri, '/ambiente')) echo 'active' ?>">
                <a href="/ambiente" class="nav-link">
                    <span class="material-symbols-outlined">settings</span>
                    <span>Ambiente</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="navbar-right">
        <div class="user-profile">
            <div class="profile-info">
                <span class="user-name"><?= $_SESSION['user']['name'] ?? 'Usuário' ?></span>
                <span class="user-role"><?= $_SESSION['user']['role'] ?? 'Atleta' ?></span>
            </div>
            <div class="profile-avatar">
                <img src="<?= BASE_URL ?>assets/images/<?= $_SESSION['user']['profile_picture'] ?? 'profile_picture.png'; ?>" alt="Foto de perfil">
                <div class="status-indicator"></div>
            </div>
        </div>

        <div class="logout-section">
            <form action="/logout" method="POST" class="logout-form">
                <button type="submit" class="btn btn-danger btn-sm">
                    <span class="material-symbols-outlined">logout</span>
                    <span>Sair</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: var(--space-4) var(--space-8);
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--gray-100);
        position: relative;
    }

    .navbar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--primary-50) 0%, rgba(255, 255, 255, 0.8) 100%);
        opacity: 0.8;
        z-index: -1;
    }

    .navbar-left {
        display: flex;
        align-items: center;
        gap: var(--space-8);
    }

    .logo {
        display: flex;
        align-items: center;
    }

    .logo-link {
        display: flex;
        align-items: center;
        gap: var(--space-2);
        text-decoration: none;
        font-weight: 700;
        font-size: var(--font-size-xl);
        color: var(--primary-600);
        transition: all var(--transition-fast);
    }

    .logo-link:hover {
        transform: scale(1.05);
        color: var(--primary-700);
    }

    .logo-icon {
        font-size: var(--font-size-2xl);
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    .logo-text {
        background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-800) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: var(--space-1);
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: var(--space-2);
        padding: var(--space-3) var(--space-4);
        text-decoration: none;
        color: var(--gray-600);
        font-weight: 500;
        font-size: var(--font-size-sm);
        border-radius: var(--radius-lg);
        transition: all var(--transition-fast);
        position: relative;
        overflow: hidden;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left var(--transition-slow);
    }

    .nav-link:hover::before {
        left: 100%;
    }

    .nav-link:hover {
        color: var(--primary-600);
        background: rgba(255, 255, 255, 0.8);
        transform: translateY(-1px);
    }

    .nav-item.active .nav-link {
        background: linear-gradient(135deg, var(--primary-500) 0%, var(--primary-600) 100%);
        color: white;
        box-shadow: var(--shadow-md);
    }

    .nav-item.active .nav-link:hover {
        background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-700) 100%);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .nav-link .material-symbols-outlined {
        font-size: var(--font-size-lg);
        transition: transform var(--transition-fast);
    }

    .nav-link:hover .material-symbols-outlined {
        transform: scale(1.1);
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: var(--space-4);
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: var(--space-3);
        padding: var(--space-2) var(--space-4);
        background: rgba(255, 255, 255, 0.8);
        border-radius: var(--radius-xl);
        border: 1px solid var(--gray-100);
        transition: all var(--transition-fast);
    }

    .user-profile:hover {
        background: rgba(255, 255, 255, 0.95);
        box-shadow: var(--shadow-md);
        transform: translateY(-1px);
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .user-name {
        font-weight: 600;
        font-size: var(--font-size-sm);
        color: var(--gray-800);
        line-height: 1.2;
    }

    .user-role {
        font-size: var(--font-size-xs);
        color: var(--gray-500);
        text-transform: capitalize;
    }

    .profile-avatar {
        position: relative;
        width: 40px;
        height: 40px;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--primary-200);
        transition: all var(--transition-fast);
    }

    .profile-avatar:hover img {
        border-color: var(--primary-400);
        transform: scale(1.05);
    }

    .status-indicator {
        position: absolute;
        bottom: 2px;
        right: 2px;
        width: 12px;
        height: 12px;
        background: var(--success-500);
        border: 2px solid white;
        border-radius: 50%;
        box-shadow: var(--shadow-sm);
    }

    .logout-section {
        display: flex;
        align-items: center;
    }

    .logout-form {
        margin: 0;
    }

    .logout-form .btn {
        border-radius: var(--radius-xl);
        font-size: var(--font-size-xs);
        padding: var(--space-2) var(--space-4);
    }

    @media (max-width: 1024px) {
        .navbar {
            padding: var(--space-3) var(--space-4);
        }
        
        .navbar-left {
            gap: var(--space-4);
        }
        
        .nav-menu {
            gap: 0;
        }
        
        .nav-link span:not(.material-symbols-outlined) {
            display: none;
        }
        
        .nav-link {
            padding: var(--space-3);
        }
    }

    @media (max-width: 768px) {
        .navbar {
            flex-direction: column;
            gap: var(--space-4);
            padding: var(--space-4);
        }
        
        .navbar-left {
            width: 100%;
            justify-content: space-between;
        }
        
        .nav-menu {
            gap: var(--space-1);
        }
        
        .navbar-right {
            width: 100%;
            justify-content: center;
        }
        
        .user-profile {
            flex: 1;
            justify-content: center;
        }
        
        .profile-info {
            align-items: center;
        }
    }

    @media (max-width: 480px) {
        .nav-menu {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .user-profile {
            flex-direction: column;
            text-align: center;
            gap: var(--space-2);
        }
        
        .profile-info {
            align-items: center;
        }
    }
</style>