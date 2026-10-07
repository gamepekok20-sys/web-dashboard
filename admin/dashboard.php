<?php

include "../auth/session.php";
include "../config/database.php";
include "../includes/header.php";
include "../includes/navbar.php";
include "../includes/sidebar.php";


// TOTAL USER
$user_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM user"
);

$total_user = mysqli_fetch_assoc($user_query)['total'];


// TOTAL PRODUCT
$product_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM product"
);

$total_product = mysqli_fetch_assoc($product_query)['total'];


// TOTAL CUSTOMER
$customer_query = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM customer"
);

$total_customer = mysqli_fetch_assoc($customer_query)['total'];


// TOTAL REVENUE
$revenue_query = mysqli_query(
    $conn,
    "SELECT SUM(total) AS total FROM sales"
);

$total_revenue = mysqli_fetch_assoc($revenue_query)['total'];

if (!$total_revenue) {
    $total_revenue = 0;
}

?>

<main class="main-content">

    <div class="page-header">

        <div>

            <h1>Dashboard</h1>

            <p>
                Corporate business overview
            </p>

        </div>

    </div>


    <!-- STATISTICS -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-info">

                <span>Total Revenue</span>

                <strong>
                    Rp <?= number_format($total_revenue, 0, ',', '.'); ?>
                </strong>

            </div>

            <div class="stat-icon">
                Rp
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-info">

                <span>Total Products</span>

                <strong>
                    <?= $total_product; ?>
                </strong>

            </div>

            <div class="stat-icon">
                P
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-info">

                <span>Total Customers</span>

                <strong>
                    <?= $total_customer; ?>
                </strong>

            </div>

            <div class="stat-icon">
                C
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-info">

                <span>Total Users</span>

                <strong>
                    <?= $total_user; ?>
                </strong>

            </div>

            <div class="stat-icon">
                U
            </div>

        </div>

    </div>


    <!-- ANALYTICS -->

    <div class="dashboard-grid">

        <section class="panel">

            <div class="panel-header">

                <h2>Sales Analytics</h2>

                <select>

                    <option>2026</option>
                    <option>2025</option>
                    <option>2024</option>

                </select>

            </div>

            <div class="chart-container">

                <canvas id="salesChart"></canvas>

            </div>

        </section>


        <section class="panel">

            <div class="panel-header">

                <h2>Sales Category</h2>

            </div>

            <div class="chart-container">

                <canvas id="categoryChart"></canvas>

            </div>

        </section>

    </div>


    <!-- RECENT SALES -->

    <section class="panel">

        <div class="panel-header">

            <h2>Recent Transactions</h2>

            <a href="#">
                View All
            </a>

        </div>

        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>

                    </tr>

                </thead>

                <tbody>

                <?php

                $sales = mysqli_query(
                    $conn,
                    "SELECT sales.*,
                            product.product_name
                     FROM sales
                     JOIN product
                     ON sales.product_id = product.id
                     ORDER BY sales.id DESC
                     LIMIT 5"
                );

                while ($row = mysqli_fetch_assoc($sales)):

                ?>

                    <tr>

                        <td>
                            #<?= $row['id']; ?>
                        </td>

                        <td>
                            <?= $row['product_name']; ?>
                        </td>

                        <td>
                            <?= $row['quantity']; ?>
                        </td>

                        <td>
                            Rp <?= number_format(
                                $row['total'],
                                0,
                                ',',
                                '.'
                            ); ?>
                        </td>

                        <td>
                            <?= $row['sale_date']; ?>
                        </td>

                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/dashboard.js"></script>

<?php include "../includes/footer.php"; ?>