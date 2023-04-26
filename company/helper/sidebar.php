<nav>
    <div class="sidebar-top">
        <span class="shrink-btn">
            <i class='bx bx-chevron-left'></i>
        </span>
        <img src="../../tpc/images/logo.png" class="logo" alt="Logo">
        <h3 class="hide">BVM -TPC</h3>
    </div>

    <div class="sidebar-links">
        <h4 class="hide">Placment Drive</h4>
        <ul>

            <li class="tooltip-element" data-tooltip="0">
                <a href="../company/index.php" data-active="0">
                    <div class="icon">
                    <i class='bx bx-info-circle'></i>
                        <i class='bx bxs-tachometer'></i>
                    </div>
                    <span class="link hide">Instructions</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="0">
                <a href="../company/requestDrive.php" data-active="0">
                    <div class="icon">
                        <i class='bx bx-tachometer'></i>
                        <i class='bx bxs-tachometer'></i>
                    </div>
                    <span class="link hide">Request Drive</span>
                </a>
            </li>

            <li class="tooltip-element" data-tooltip="2">
                <a href="../company/currentDrive.php" data-active="2">
                    <div class="icon">
                        <i class='bx bx-message-square-detail'></i>
                        <i class='bx bxs-message-square-detail'></i>
                    </div>
                    <span class="link hide">Current Drive</span>
                </a>
            </li>

        </ul>

        <ul>
            <li class="tooltip-element" data-tooltip="3">
                <a href="../company/generateOfferLetter.php" data-active="3">
                    <div class="icon">
                        <i class='bx bx-bar-chart-square'></i>
                        <i class='bx bxs-bar-chart-square'></i>
                    </div>
                    <span class="link hide">Generate Offer Letter</span>
                </a>
            </li>
           

            



        </ul>
        <h4 class="hide">Setting</h4>
        <ul>

            
            
           
            <li class="tooltip-element" data-tooltip="2">
                <a href="../company/settings.php" data-active="6">
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
                <?php
                $company_id = $_SESSION["companyId"];
                $company = $conn->query("SELECT company_logo FROM company WHERE company_id = '$company_id'");
                $company_data = $company->fetch_assoc();
                $company_logo = $company_data["company_logo"];
                $logo = "";
                if (is_null($company_logo)) {
                    $logo = "../../tpc/images/user-icon.png";
                } else {
                    $logo = "../../tpc/uploads/logo/$company_logo";
                }
                ?>
                <img src="<?php echo $logo ?>" alt="" class="icon icon-shape rounded-circle">
                <div class="admin-info">
                    <h3><?php echo $_SESSION["companyUserId"] ?></h3>
                </div>
            </div>
            <a href="../../tpc/logout.php" class="log-out">
                <i class='bx bx-log-out'></i>
            </a>
        </div>

    </div>
</nav>