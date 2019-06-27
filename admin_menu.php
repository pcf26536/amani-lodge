<?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
    echo '<ul class="menu">';
    echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
    echo '<li class="monitor"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
    echo '<li class="c"><a href="roominventory.php"><img src="images/report.png" alt="report" /></a></li>';
    echo '<li class="d"><a href="room.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
    echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
    echo '</ul>';
}
?>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="frontdesk"){
    echo '<ul class="menu">';
    echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
    echo '<li class="monitor"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
    echo '<li class="c"><a href="roominventory.php"><img src="images/report.png" alt="report" /></a></li>';
    echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
    echo '</ul>';

}
?>