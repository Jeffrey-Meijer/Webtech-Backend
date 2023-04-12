<div class="header" style="display: flex;justify-content: space-between; background-color: aqua">
    <div class="header-image">
        <img src="https://placehold.jp/150x150.png">
    </div>
    <div class="header-menu">
        <a href="/">Home</a>
        <?php if (isset($_SESSION["role"])) : ?>
            <?php if ($_SESSION["role"] == "Student") : ?>
                <a href="/exams">Exams</a>
                <a href="/grades">Grades</a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (isset($_SESSION["role"])) : ?>
            <?php if ($_SESSION["role"] == "Administrator") : ?>
                <a href="/admin">Admin tools</a>
            <?php elseif ($_SESSION["role"] == "Teacher"): ?>
                <a href="/teacher">Teacher tools</a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (!isset($_SESSION["logged_in"])): ?>
            <a href="/login">Login</a>
        <?php else: ?>
            <a href="/logout">Logout</a>
        <?php endif; ?>
    </div>
</div>