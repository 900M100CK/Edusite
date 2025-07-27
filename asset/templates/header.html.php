<?php
$avatar = null;
if(isset($_SESSION['user_id'])){
    $user = getUsernameAvatarById($pdo, $_SESSION['user_id']);
    $avatar = $user['avatar'] ?? 'image/default-user.png';
}

$currentPage = basename($_SERVER['PHP_SELF']);
$isAuthPage = in_array($currentPage, ['login.php', 'signup.php', 'tag.php']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - My Education Website</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Times+New+Roman:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body class="<?php if ($isAuthPage) echo 'auth-page'; ?>">
    <a href="#main-content" class="skip-link">Skip to Main Content</a>

    <header class="header">
        <div class="container">
            <button id="sidebar-toggle" class="hamburger" aria-label="Open sidebar" aria-controls="sidebar" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="logo">
                <a href="index.php" aria-label="Logo">
                    <h1>EduSite</h1>
                </a>
            </div>
            <nav role="navigation" aria-label="Main Navigation" class="main-nav">
                <ul>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="header-search">
                <form action="search.php" method="GET" role="search">
                    <label for="search-query" class="sr-only">Search Courses</label>
                    <input type="search" id="search-query" name="query" placeholder="Search courses...">
                    <button type="submit" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </form>
            </div>
            <?php if (isset($_SESSION['user_id']) && !$isAuthPage): ?>
                    <div class="auth-avatar-logout">
                    <img src="<?= htmlspecialchars($avatar) ?>" alt="Avatar" class="avatar" />
                    <a href="logout.php" title="Đăng xuất">
                        <i class='bx bx-log-out' style="font-size: 24px;">logout</i>
                    </a>
                </div>
            <?php elseif (!$isAuthPage): ?>
                <div class="auth-buttons">
                    <a href="login.php" class="btn btn-login" aria-label="Login">Login</a>
                    <a href="signup.php" class="btn btn-signup" aria-label="Sign Up">Sign Up</a>
                </div>
            <?php endif; ?>
        </div>
    </header>