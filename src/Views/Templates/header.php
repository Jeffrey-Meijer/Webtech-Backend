<div class="header" style="display: flex;justify-content: space-between; background-color: aqua">
    <div class="header-image">
        <img src="https://placehold.jp/150x150.png">
    </div>
    <div class="header-menu">
        <a href="/">Home</a>
        <a href="/exams">Exams</a>
        <a href="/grades">Grades</a>
        <?php if (!isset($_SESSION["logged_in"])): ?>
            <a href="/login">Login</a>
        <?php else: ?>
            <a href="/logout">Logout</a>
        <?php endif; ?>
    </div>
</div>