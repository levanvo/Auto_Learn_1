<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $dateNow = date('Y-m-d');
    //thống kê
    $query = "SELECT  COUNT(sanpham.id_dm) AS number, danhmuc.*  FROM sanpham
            INNER JOIN danhmuc ON danhmuc.id_dm =sanpham.id_dm
            GROUP BY sanpham.id_dm";
    $stmt = $conn->query($query)->fetchAll();
    // echo "<pre>";
    // var_dump($stmt);

    // quert sản phẩm 
    $kqvc = $conn->query("SELECT * FROM magiamgia")->fetchAll();
    //total price
    // $kqdh = $conn->query("SELECT * FROM donhang")->fetchAll();
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid mb-2">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thống kê danh mục</h1>
            </div>
            <!-- Content Row -->
            <html>

            <head>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['ten_dm', 'number'],
                            <?php
                            foreach ($stmt as $key) {
                                $number = $key['number'];
                                $name = $key['name'];
                                echo "['" . $name . "'" . "," . $number . "],";
                            }
                            ?>
                        ]);

                        var options = {
                            title: 'Thống kê danh mục sản phẩm'
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
            </head>

            <body>
                <div id="piechart" style="width: 1235px; height: 500px;"></div>
            </body>

            </html>
            <!-- ========================================================================================================= -->
            <!-- total_Price -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thống kê tổng tiền từ đơn hàng</h1>
            </div>
            <div class="total_price">
                <form action="" method="POST">
                    <label for="">Thời gian</label>
                    <select name="datetime">
                        <option value=""></option>
                        <option value="<?php echo date('Y-m-d', strtotime(' - 7 days')); ?>">7 ngày trước</option>
                        <option value="<?php echo date('Y-m-d', strtotime(' - 30 days')); ?>">1 tháng trước</option>
                        <option value="<?php echo date('Y-m-d', strtotime(' - 365 days')); ?>">1 năm trước</option>
                    </select>
                    <button style="border: none;color:white;background-color: #91ad41;" type="submit" name="btn_getDate">lựa chọn</button>
                </form>
                <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0" id="dataTable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $lastPrice = 0;
                            $total = 0;
                            $i = 1;
                            if (isset($_POST['btn_getDate'])) {
                                $dated = $_POST['datetime'];
                                $kqdh = $conn->query("SELECT * FROM donhang INNER JOIN chitietdonhang ON donhang.id_dh = chitietdonhang.id_dh
                                 WHERE time BETWEEN '$dated' AND '$dateNow'")->fetchAll();
                            ?>
                                <h3 style="padding: 30px;text-align: center;"><?php $date = date('Y-m-d', strtotime($dateNow . ' - 365 days'));
                                    echo "Kể từ ngày <strong> $date </strong> đến <strong>$dateNow</strong>";
                                    ?></h3>
                            <?php
                            } else {
                                $kqdh = $conn->query("SELECT * FROM donhang INNER JOIN chitietdonhang ON donhang.id_dh = chitietdonhang.id_dh")->fetchAll();
                            }
                            foreach ($kqdh as $key) {
                            ?>
                                <tr>
                                    <th><?= $i++ ?></th>
                                    <th><?= $key['id_dh'] ?></th>
                                    <th>
                                        <?php
                                        echo number_format($total += $key['price'] * $key['quantity'])
                                        ?>đ
                                    </th>
                                </tr>
                            <?php
                                $lastPrice += $total;
                            }
                            ?>

                        </tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td><strong style="color:red;font-size:18px;"> Tổng doanh thu: </strong></td>
                            <td><strong style="color:red;font-size:18px;"><?php echo number_format($lastPrice) ?>đ</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- <h1 class="h3 mb-2 text-gray-800">Thống kê</h1> -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->