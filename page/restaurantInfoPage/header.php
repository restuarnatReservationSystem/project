<header class="header">
    <div class="header-left">
        <img src="/pj/image/logo.jpg" alt="로고" class="logo">
        <h1 class="title">제목</h1>
    </div>
    <div class="header-center">
        <h1 class="title">식당이름</h1>
    </div>
    <nav class="header-right">
        <a href="#" class="nav-item">마이페이지</a>
        <a href="#" class="nav-item">
            <?php echo isset($_SESSION['user']) ? '로그아웃' : '로그인'; ?>
        </a>
    </nav>
</header>
