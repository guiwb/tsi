<?php
$uri = $_SERVER['REQUEST_URI'];
?>

<nav>
    <div class="left">
        <div class="logo"><a href="/">NAPP</a></div>

        <ul>
            <li <?php if ($uri == '/') echo 'class="active"' ?>><a href="/">Página inicial</a></li>
            <li <?php if (str_starts_with($uri, '/equipes')) echo 'class="active"' ?>><a href="/equipes">Equipes</a></li>
            <li <?php if (str_starts_with($uri, '/treinos')) echo 'class="active"' ?>><a href="/treinos">Treinos</a></li>
            <li <?php if (str_starts_with($uri, '/usuarios')) echo 'class="active"' ?>><a href="/usuarios">Usuários</a></li>
            <li <?php if (str_starts_with($uri, '/ambiente')) echo 'class="active"' ?>><a href="/ambiente">Ambiente</a></li>
        </ul>
    </div>

    <div class="right">
        <div class="profile">
            <img src="<?= BASE_URL ?>assets/images/<?= $_SESSION['user']['profile_picture'] ?? 'profile_picture.png'; ?>" alt="User Profile Picture">
        </div>

        <div class="logout">
            <form action="/logout" method="POST">
                <button class="danger small rounded" type="submit">
                    <div>
                        <span class="material-symbols-outlined">logout</span>Sair
                    </div>
                </button>
            </form>
        </div>
    </div>
</nav>

<style>
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
        padding: 0 20px 0 40px;
        border-radius: 60px;
        background: linear-gradient(90deg, #7d6bf7 0%, #5038ED 100%);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
        color: white;
    }

    .left {
        display: flex;
        align-items: center;
    }

    .left ul {
        display: flex;
        align-items: center;
        list-style: none;
        margin-left: 20px;
        padding: 0;
    }

    .left li {
        margin: 0 15px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: transform 0.2s ease-in-out;
    }

    .left li:hover {
        transform: translateY(2px);
    }

    .left li.active {
        background: white;
        padding: 10px 15px;
        border-radius: 30px;
        color: #5038ED;
        margin: 0;
    }

    .logo {
        font-size: 14px;
        font-weight: bold;
    }

    .right {
        display: flex;
        align-items: center;
    }

    .profile {
        display: flex;
        align-items: center;
        margin-right: 20px;
    }

    .profile p {
        margin-right: 10px;
    }

    .profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .logout button span {
        transform: scale(0.8);
        margin-right: 5px;
        margin-top: -2px;
    }

    .logout button div {
        display: flex;
        align-items: center;
        transition: all 0.2s ease-in-out;
    }

    .logout button div:hover {
        transform: translateX(2px);
    }
</style>