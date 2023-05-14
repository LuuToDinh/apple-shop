<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "productdb";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // get data value from href
    $data=$_GET['data'];
    // echo $data;

    $sql="Select * from `products` where id=$data";
    $result=mysqli_query($conn, $sql);
    if($result) {
        // product from products
        $row=mysqli_fetch_assoc($result);
        // echo $row['name'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product information</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&family=Raleway&family=Rubik&display=swap">

    <link rel="stylesheet" href="./assets/css/base-detail.css">
    <link rel="stylesheet" href="./assets/css/style-detail.css">
</head>

<body>
    <!-- Search -->
    <div class="container">
        <div class="row">
            <a class="btn btn-primary mt-5" role="button" href="index.php">Back to the search</a>
        </div>
    </div>
    <!-- !Search -->

    <!-- main -->
    <main class="main">

        <!--   product  -->
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <?php 
                            echo '
                                <div style="background-image: url('.$row['image'].')" class="img-show">
                                </div>
                                <div class="img-selects">
                                    <div style="background-image: url('.$row['image'].')" class="img-select"></div>
                                    <div style="background-image: url('.$row['image1'].')" class="img-select"></div>
                                    <div style="background-image: url('.$row['image2'].')" class="img-select"></div>
                                    <div style="background-image: url('.$row['image3'].')" class="img-select"></div>
                                </div>
                            '
                        ?>
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Mua ngay</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-warning form-control">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <?php 
                            echo '
                                <h3 class="font-baloo font-size-20">'.$row['name'].'</h3>
                            '
                        ?>
                        <small>
                            <?php 
                                echo ''.$row['type'].''
                            ?>
                        </small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <!-- <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span> -->
                                <?php 
                                    for ($star = 0; $star < 5; $star++) {
                                        if($star < $row['rating']){
                                            echo '<span><i class="fas fa-star"></i></span>';
                                        } else {
                                            echo '<span><i class="far fa-star"></i></span>';
                                        }
                                    } 
                                ?>
                            </div>
                        </div>
                        <hr class="m-0">

                        <!--- product price  -->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>Giá gốc:</td>
                                <td>
                                    <strike>
                                        <?php 
                                            echo ''.$row['price'].'đ'
                                        ?>
                                    </strike>
                                </td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>Giá ưu đãi:</td>
                                <td class="font-size-20 text-danger pl-2">
                                    <span>
                                        <?php 
                                            echo ''.$row['price'].'đ'
                                        ?>
                                    </span>
                                    <small class="text-dark font-size-12">&nbsp;&nbsp;Bao gồm thuế</small>
                                </td>
                            </tr>
                        </table>
                        <!--- product price  -->

                        <!--    #policy -->
                        <div id="policy">
                            <div class="d-flex justify-content-between">
                                <div class="returning-policy text-center mr-5">
                                    <div class="font-size-20 my-2">
                                        <span class="fas fa-retweet border p-3 rounded-pill text-success"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12 text-decoration-none">10 Ngày <br> Hoàn
                                        trả</a>
                                </div>
                                <div class="returning-policy text-center mr-5">
                                    <div class="font-size-20 my-2">
                                        <span class="fas fa-truck  border p-3 rounded-pill text-success"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12 text-decoration-none">Giao hàng<br>nhanh
                                        chóng</a>
                                </div>
                                <div class="returning-policy text-center mr-5">
                                    <div class="font-size-20 my-2">
                                        <span class="fas fa-check-double border p-3 rounded-pill text-success"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12 text-decoration-none">Bảo hành<br>1
                                        năm</a>
                                </div>
                            </div>
                        </div>
                        <!--    !policy -->
                        <hr>

                        <!-- order-details -->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Sản phẩm còn lại: <span class="text-primary" href="#"><?php echo ''.$row['amount'].'' ?> </span></small>
                            <small>Dự kiến giao hàng: 5 ngày</small>
                            <small>Loại sản phẩm: <span class="text-primary" href="#"><?php echo ''.$row['type'].'' ?> </span></small>
                            <small><i class="fas fa-map-marker-alt color-primary mr-2"></i>Xuất xứ : Chính hãng</small>
                        </div>
                    </div>

                    <div class="detail col col-12 pt-5">
                        <h3>Mô tả</h3>
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item">
                                    <a data-toggle="pill" href="#info-product" class="nav-link active "> Thông tin sản
                                        phẩm
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="pill" href="#outstanding" class="nav-link "> Đặc điểm nổi bật </a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="pill" href="#quanranting" class="nav-link "> Thông tin bảo hành </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="info-product" class="tab-pane fade show active pt-3">
                                <h4>Thông số kĩ thuật</h4>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Loại sản phẩm</th>
                                        <th><?php echo $row['type']; ?></th>
                                    </tr>
                                    <!-- <tr>
                                        <th>Bảo hành</th>
                                        <th>12 tháng</th>
                                    </tr> -->
                                    <tr>
                                        <th>Model</th>
                                        <th><?php echo $row['name']; ?></th>
                                    </tr>
                                    <tr>
                                        <th>CPU</th>
                                        <th><?php echo $row['chip']; ?></th>
                                    </tr>
                                    <tr>
                                        <th>RAM</th>
                                        <th>
                                            <?php echo $row['ram']; ?>
                                        </th>
                                    </tr>
                                    <!-- <tr>
                                        <th>Ổ cứng</th>
                                        <th>256GB SSD M.2 PCIE, 1x slot SATA3 2.5"</th>
                                    </tr> -->
                                    <!-- <tr>
                                        <th>Card đồ họa</th>
                                        <th><?php echo $row['gpu']; ?></th>
                                    </tr> -->
                                    <tr>
                                        <th>Màn hình</th>
                                        <th><?php echo $row['screen']; ?></th>
                                    </tr>
                                    <!-- <tr>
                                        <th>Cổng giao tiếp</th>
                                        <th> 1x USB 3.1, 2x USB 2.0, HDMI, RJ-45</th>
                                    </tr>
                                    <tr>
                                        <th>Ổ quang</th>
                                        <th>None</th>
                                    </tr>
                                    <tr>
                                        <th>Audio</th>
                                        <th>Realtek High Definition</th>
                                    </tr>
                                    <tr>
                                        <th>Đọc thẻ nhớ</th>
                                        <th>None</th>
                                    </tr>
                                    <tr>
                                        <th>Chuẩn LAN</th>
                                        <th>10/100/1000 Mbps</th>
                                    </tr>
                                    <tr>
                                        <th>Chuẩn WIFI</th>
                                        <th>802.11 ac</th>
                                    </tr>
                                    <tr>
                                        <th>Bluetooth</th>
                                        <th>v4.2</th>
                                    </tr>
                                    <tr>
                                        <th>Webcam</th>
                                        <th>HD Webcam</th>
                                    </tr>
                                    <tr>
                                        <th>Hệ điều hành</th>
                                        <th>Windows 10 Home</th>
                                    </tr> -->
                                    <tr>
                                        <th>Pin</th>
                                        <th><?php echo $row['battery']; ?></th>
                                    </tr>
                                    <!-- <tr>
                                        <th>Trọng lượng</th>
                                        <th>1.7 kg</th>
                                    </tr>
                                    <tr>
                                        <th>Màu sắc</th>
                                        <th>Shale Black</th>
                                    </tr>
                                    <tr>
                                        <th>Kích thước</th>
                                        <th>363 x 247.5 x 19.9 (mm)</th>
                                    </tr> -->
                                </table>

                            </div>
                            <div id="outstanding" class="tab-pane fade pt-3">
                                <?php echo $row['outstanding']; ?>
                            </div>
                            <div id="quanranting" class="tab-pane fade pt-3">
                                <?php echo $row['guarantee']; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product -->


        <!-- Top Sale -->
        <section id="top-sale">
            <div class="container py-5">
                <!-- <h4 class="font-rubik font-size-20">Top Sale</h4> -->
                <h3>Top sale</h3>
                <hr>

                <!-- owl carousel: slider -->
                <div class="owl-carousel owl-theme">
                    <?php
                        for ($i = 1; $i <= 10; $i++) {
                                $sql="Select * from `products` where id='$i'";
                                $result=mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result) > 0) {
                                    if($row = mysqli_fetch_assoc($result)){
                                        // '.$row['name'].'
                                        echo '
                                            <a href="http://localhost/web-shop-project/product-search/detail.php?data='.$row['id'].'" class="recommend-product-link item py-2">
                                                <div class="product font-rale">
                                                    <div class="d-flex flex-column">
                                                        <div style="background-image: url('.$row['image'].')" class="recommend-product-img img-fluid"></div>
                                                    </div> 
                                                </div>
                                                <div class="text-center recommend-product-info">
                                                    <h6 class="recommend-product-name">'.$row['name'].'</h6>
                                                    <div class="recommend-product-rating text-warning font-size-12">
                                                ';

                                                for ($star = 0; $star < 5; $star++) {
                                                    if($star < $row['rating']){
                                                        echo '<span><i class="fas fa-star"></i></span>';
                                                    } else {
                                                        echo '<span><i class="far fa-star"></i></span>';
                                                    }
                                                }
                                                echo '
                                                </div>
                                                    <div class="recommend-product-price py-2">
                                                        <span>'.$row['price'].'đ</span>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning font-size-12 mr-5 ml-5">Chi tiết</button>
                                                </div>
                                            </a> 
                                                ';
                                    }
                            }
                            
                        }
                    ?>
                </div>
                <!-- owl carousel: slider -->
            </div>
        </section>
        <!-- Top Sale -->

    </main>
    <!-- main -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!-- Custom Javascript -->
    <script src="./assets/js/detail.js"></script>
</body>

</html>