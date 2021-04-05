<?php
require_once "models/statistics/functions.php";
require_once "config/connection.php";

if (isset($_SESSION['user']) && $_SESSION['user']->roleName == 'admin') : ?>
    <div class="container table-responsive">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>24h Statistics</h1>
        </div>
    </div>
        <table class="table table-bordered table-striped">
            <?php
            $allPages = allPages();
            $numOfPages = count($allPages);
            ?>
            <thead class="thead-light">
                <tr>
                    <?php foreach ($allPages as $item) : ?>
                        <th scope="col"><?= $item; ?></th>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <?php foreach (accessToPagesPercentage() as $item) : ?>
                        <td><?= $item; ?>%</td>
                    <?php endforeach; ?>
                </tr>
            </thead>
        </table>
        <div class="row">
            <div class="col-lg-12 text-center">
                 Number Of Logged In Users: <?= numberOfLoggedInUsers(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>