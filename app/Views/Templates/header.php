<header class="header d-flex justify-content-between bg-dark align-items-center mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">OsirisComp</a>
        <!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"-->
        <!--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--            <span class="navbar-toggler-icon"></span>-->
        <!--        </button>-->
        <div id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <?php
                if (isset($_SESSION["role"])) : ?>
                    <?php
                    if ($_SESSION["role"] == "Student") : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/exams">Exams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/grades">Grades</a>
                        </li>
                    <?php
                    endif; ?>
                <?php
                endif; ?>
                <?php
                if (isset($_SESSION["role"])) : ?>
                    <?php
                    if ($_SESSION["role"] == "Administrator") : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin tools</a>
                        </li>
                    <?php
                    elseif ($_SESSION["role"] == "Teacher"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/teacher">Teacher tools</a>
                        </li>
                    <?php
                    endif; ?>
                <?php
                endif; ?>
                <?php
                if (!isset($_SESSION["logged_in"])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                <?php
                else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                <?php
                endif; ?>
            </ul>
        </div>
    </nav>
</header>