<nav>
    <div class="sidebar-top">
        <span class="shrink-btn">
            <i class='bx bx-chevron-left'></i>
        </span>
        <img src="http://localhost/tpc/images/logo.png" class="logo" alt="Logo">
        <h3 class="hide">TPC</h3>
    </div>

    <div class="sidebar-links">
        <ul>
            <!-- <div class="active-tab"></div> -->
            <li class="tooltip-element" data-tooltip="0">
                <a href="index.php">
                    <div class="icon">
                        <i class='bx bx-notification'></i>
                    </div>
                    <span class="link hide si">Announcements</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="1">
                <a href="results.php">
                    <div class="icon">
                        <i class='bx bx-notepad'></i>
                    </div>
                    <span class="link hide si">Results</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="2">
                <a href="companies.php">
                    <div class="icon">
                        <i class='bx bxs-institution'></i>
                    </div>
                    <span class="link hide si">Upcoming Companies</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="3">
                <a href="drives.php">
                    <div class="icon">
                        <i class='bx bx-bar-chart'></i>
                    </div>
                    <span class="link hide si">Drives</span>
                </a>
            </li>
            <div class="tooltip">
                <span>Announcements</span>
                <span>Results</span>
                <span>Upcoming Companies</span>
                <span>Drives</span>
            </div>
        </ul>
        <h4 class="hide">Shortcuts</h4>
        <ul>
            <li class="tooltip-element" data-tooltip="0">
                <a href="resume.php" data-active="4">
                    <div class="icon">
                        <i class='bx bx-user-detail'></i>
                        <i class='bx bxs-user-detail'></i>
                    </div>
                    <span class="link hide si">Resume</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="1">
                <a href="viewStudent.php" data-active="5">
                    <div class="icon">
                        <i class='bx bx-user'></i>
                    </div>
                    <span class="link hide si">Profile</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="2">
                <a href="settings.php" data-active="6">
                    <div class="icon">
                        <i class='bx bx-cog'></i>
                    </div>
                    <span class="link hide si">Settings</span>
                </a>
            </li>
            <div class="tooltip">
                <span class="show">Resume</span>
                <span>Profile</span>
                <span>Settings</span>
            </div>
        </ul>
    </div>
    <div class="sidebar-footer">
        <a href="#" class="account tooltip-element" data-tooltip="0">
            <i class='bx bx-user'></i>
        </a>
        <div class="admin-user tooltip-element" data-tooltip="1">
            <div class="admin-profile hide">
                <?php
                $id = $_SESSION["studentUserId"];
             
                $stu = $conn->query("SELECT photo FROM student_document WHERE s_id = '$id'");
                $stu_data = $stu->fetch_assoc();
                $stu_logo = $stu_data["photo"];
                $logo = "";
                if (is_null($stu_logo)) {
                    $logo = "../../tpc/images/user-icon.png";
                } else {
                    $logo = "../../tpc/uploads/student/$stu_logo";
                }
                ?>
                <img src="../../uploads/student/<?php echo $logo ?>" alt="">
                <div class="admin-info">
                    <h3><?php echo strtoupper($_SESSION["studentUserId"]) ?></h3>
                </div>
            </div>
            <a href="../../tpc/logout.php" class="log-out">
                <i class='bx bx-log-out'></i>
            </a>
        </div>
        <div class="tooltip">
            <span class="show"><?php echo strtoupper($_SESSION["studentUserId"]) ?></span>
            <span>Logout</span>
        </div>
    </div>
</nav>