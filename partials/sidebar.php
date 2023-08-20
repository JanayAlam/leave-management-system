<div class="w-100 h-100">
    <div class="list-group" style="border-radius: 0">
        <a
            href="index.php"
            class="list-group-item list-group-item-action <?php if ($page == 'dashboard') { echo 'active'; } ?>"
            aria-current="true"
        >
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>
        <a
            href="#"
            class="list-group-item list-group-item-action <?php if ($page == 'calendar') { echo 'active'; } ?>"
            aria-current="true"
        >
            <i class="fa-regular fa-calendar"></i> Calendar
        </a>
        <a
            href="#"
            class="list-group-item list-group-item-action <?php if ($page == 'leaves-to-approve') { echo 'active'; } ?>"
            aria-current="true"
        >
            <i class="fa-regular fa-thumbs-up"></i> Leaves to Approve
        </a>
        <a
            href="#"
            class="list-group-item list-group-item-action <?php if ($page == 'reports') { echo 'active'; } ?>"
            aria-current="true"
        >
            <i class="fa-regular fa-file-lines"></i> Reports
        </a>
        <a
            href="company.php"
            class="list-group-item list-group-item-action <?php if ($page == 'company') { echo 'active'; } ?>"
            aria-current="true"
        >
            <i class="fa-regular fa-building"></i> Company
        </a>
        <a
            href="profile-settings.php"
            class="list-group-item list-group-item-action <?php if ($page == 'account') { echo 'active'; } ?>"
            aria-current="true"
        >
            <i class="fa-regular fa-user"></i> My Account
        </a>
    </div>
</div>
