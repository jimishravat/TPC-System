<nav>
    <div class="sidebar-top">
        <span class="shrink-btn">
            <i class='bx bx-chevron-left'></i>
        </span>
        <img src="../../tpc/images/logo.png" class="logo" alt="Logo">
        <h3 class="hide">TPC</h3>
    </div>

    <div class="sidebar-links">
        <ul>

            <li class="tooltip-element" data-tooltip="0">
                <a href="../admin/index.php" data-active="0">
                    <div class="icon">
                        <i class='bx bx-tachometer'></i>
                        <i class='bx bxs-tachometer'></i>
                    </div>
                    <span class="link hide">Dashboard</span>
                </a>
            </li>

            <li class="tooltip-element" data-tooltip="2">
                <a href="../admin/announcements.php" data-active="2">
                    <div class="icon">
                        <i class='bx bx-message-square-detail'></i>
                        <i class='bx bxs-message-square-detail'></i>
                    </div>
                    <span class="link hide">Annoucements</span>
                </a>
            </li>

        </ul>

        <h4 class="hide">Placment Drive</h4>
        <ul>
            <li class="tooltip-element" data-tooltip="3">
                <a href="../admin/results.php" data-active="3">
                    <div class="icon">
                        <i class='bx bx-bar-chart-square'></i>
                        <i class='bx bxs-bar-chart-square'></i>
                    </div>
                    <span class="link hide">Results</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="0">
                <a href="../admin/drives.php" data-active="4">
                    <div class="icon">
                        <i class='bx bx-notepad'></i>
                        <i class='bx bxs-notepad'></i>
                    </div>
                    <span class="link hide">Drives</span>
                </a>
            </li>
            <?php if ($access == 1) : ?>
                <li class="tooltip-element" data-tooltip="2">
                    <a href="../admin/requests.php" data-active="2">
                        <div class="icon">
                            <i class='bx bx-message-square-detail'></i>
                            <i class='bx bxs-message-square-detail'></i>
                        </div>
                        <span class="link hide">Requests</span>
                    </a>
                </li>
            <?php endif ?>
            <!-- <li class="tooltip-element" data-tooltip="1">
                <a href="#" data-active="5">
                    <div class="icon">
                        <i class='bx bx-user'></i>
                        <i class='bx bxs-user'></i>
                    </div>
                    <span class="link hide">Profile</span>
                </a>
            </li> -->


        </ul>
        <h4 class="hide">Manage</h4>
        <ul>

            <li class="tooltip-element" data-tooltip="1">
                <a href="../admin/student.php" data-active="1">
                    <div class="icon">
                        <i class='bx bx-folder'></i>
                        <i class='bx bxs-folder'></i>
                    </div>
                    <span class="link hide">Students</span>
                </a>
            </li>
            <?php if ($access == 3) : ?>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="../admin/studentApprove.php" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Approve Students</span>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($access == 1) : ?>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="../admin/tpf.php" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">TPF</span>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($access == 1 || $access == 2) : ?>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="../admin/tpc.php" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">TPC</span>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($access == 1) : ?>
                <li class="tooltip-element" data-tooltip="3">
                    <a href="../admin/company.php" data-active="3">
                        <div class="icon">
                            <i class='bx bx-bar-chart-square'></i>
                            <i class='bx bxs-bar-chart-square'></i>
                        </div>
                        <span class="link hide">Company</span>
                    </a>
                </li>
            <?php endif ?>
            <li class="tooltip-element" data-tooltip="2">
                <a href="../admin/settings.php" data-active="6">
                    <div class="icon">
                        <i class='bx bx-cog'></i>
                        <i class='bx bxs-cog'></i>
                    </div>
                    <span class="link hide">Change Password</span>
                </a>
            </li>


        </ul>
    </div>
    <div class="sidebar-footer">
        <a href="#" class="account tooltip-element" data-tooltip="0">
            <i class='bx bx-user'></i>
        </a>
        <div class="admin-user tooltip-element" data-tooltip="1">
            <div class="admin-profile hide">
                <img src="../../tpc/images/logo.png" alt="">
                <div class="admin-info">
                    <h3><?php echo $adminUser ?></h3>
                </div>
            </div>
            <a href="../../tpc/logout.php" class="log-out">
                <i class='bx bx-log-out'></i>
            </a>
        </div>

    </div>
</nav>