<div style="display: none;">
    <?php
    include('session.php');
    ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Int House Building - Product</title>
    <link rel="icon" href="logo.ico" />
    <link rel="stylesheet" href="styleProduct.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div id="navbar">
        <a href="#" class="home button">
            <b>INT</b> House Building
        </a>
        <?php
        if (!isset($_SESSION['login_user'])) {
            echo "<a href='#' id='myBtnMobile' class='button' onclick='openModal()'> Đăng nhập</a>";
        } else {
            echo "<a href='#' id='myBtnInfo' class='button' onclick='openModalInfo()'> Hello:" . $login_session . "</a>";
        }
        ?>
        <a href="#contact" class="button">
            Liên hệ
        </a>
        <a href="#about" class="button">
            Giới thiệu
        </a>
        <a href="#projects" class="button">
            Dự án
        </a>
    </div>
    <div id="navbar_mobile">
        <div id="unactive_navbar">
            <a href="#" class="home button" onclick="myFunctionForHome()">
                <b>INT</b> Building
            </a>
            <a href="javascript:void(0);" class="button" onclick="myFunction()">
                <i id="fa-bars" class="fa fa-bars"></i>
                <i id="fa-times" class="fa fa-times" style="display: none;"></i>
            </a>
        </div>
        <div id="active_navbar">
            <a href="#projects" class="button" onclick="myFunction()">
                Dự án
            </a>
            <a href="#about" class="button" onclick="myFunction()">
                Giới thiệu
            </a>
            <a href="#contact" class="button" onclick="myFunction()">
                Liên hệ
            </a>
            <?php
            if (!isset($_SESSION['login_user'])) {
                echo "<a href='#' id='myBtnMobile' class='button' onclick='openModal()'> Đăng nhập</a>";
            } else {
                echo "<a href='#' id='myBtnInfoMobile' class='button' onclick='openModalInfo()'> Hello:" . $login_session . "</a>";
            }
            ?>
        </div>
    </div>
    <div class="main_content">
        <div id="products">
            <h3 style="margin:30px 0px;">Home > Main Category > Sub Category</h3>
            <div class="sub_content_product">
                <div class="product-picture">
                    <img src="img/nha1.jpg" alt="team1" class="sub_picture">
                </div>
                <div class="product-content">
                    <div>
                        <h3>Brick House</h3>
                        <b>Summary</b>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem est doloremque, numquam,
                            repellendus dolorem error, cum porro necessitatibus omnis reiciendis odit dicta. Quis dolore
                            hic quibusdam quae, ducimus aspernatur reprehenderit.</p>
                    </div>
                    <div>
                        <h4>Price: 10$
                        </h4>
                        <a href="#" class="button about">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="decription">
                <b>Decription</b>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit pariatur veniam delectus quae
                    reprehenderit possimus nulla animi praesentium perferendis numquam ipsa, facilis quam quis
                    architecto, dolore debitis hic! Vel, eveniet.</p>
            </div>
        </div>
        <div id="projects">
            <div class="sub_title">
                <h2>Dự án</h2>
            </div>
            <div class="projects_content">
                <?php
                $sql = "SELECT * FROM post ORDER BY id LIMIT 8 OFFSET 0";
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='sub_content'>
                                <img src='./" . $row['img'] . "' alt='house1' class='sub_picture'>
                                <div class='sub_text'>
                                    <span>" . $row['category'] . "</span>
                                </div>
                                <div class='prices'>
                                    <span>" . (string)($row['cost'] / 1000000) . " TR.VND</span>
                                </div>
                            </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin-top: 18px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin-top: 20px !important;">Đăng nhập</h2>
            </div>
            <div class="modal-body">
                <form action="login.php" method="POST">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <div style="display: flex;justify-content: space-between;">
                        <input type="submit" value="Đăng nhập">
                        <div class="signup-btn">Đăng ký</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="myModalInfo" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin-top: 18px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin-top: 20px !important;">Thông tin</h2>
            </div>
            <div class="modal-body">
                <p>Tên đăng nhập: <b><?php echo $login_session; ?></b></p>
                <p>Email: <b><?php echo $email; ?></b></p>
                <p>Ngày sinh: <b><?php echo $birthday; ?></b></p>
                <p>Giới tính: <b><?php echo $sex; ?></b></p>
            </div>
            <div class="modal-footer"><button class="signup-btn" onclick="window.location='logout.php';">Đăng xuất</button></div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("active_navbar");
            if (x.style.height === "190px") {
                document.getElementById("fa-bars").style.display = "unset";
                document.getElementById("fa-times").style.display = "none";
                x.style.height = "0px";
            } else {
                x.style.height = "190px";
                document.getElementById("fa-bars").style.display = "none";
                document.getElementById("fa-times").style.display = "unset";
            }
        }

        function myFunctionforHome() {
            var x = document.getElementById("active_navbar");
            if (x.style.height === "190px") {
                document.getElementById("fa-bars").style.display = "unset";
                document.getElementById("fa-times").style.display = "none";
                x.style.height = "0px";
            }
        }
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        openModal = function() {
            modal.style.display = "block";
            myFunction();
        }


        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        var modalInfo = document.getElementById("myModalInfo");

        // Get the <span> element that closes the modalInfo
        var spanInfo = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modalInfo 
        openModalInfo = function() {
            modalInfo.style.display = "block";
            myFunction();
        }


        // When the user clicks on <span> (x), close the modalInfo
        spanInfo.onclick = function() {
            modalInfo.style.display = "none";
        }

        // When the user clicks anywhere outside of the modalInfo, close it
        window.onclick = function(event) {
            if (event.target == modalInfo) {
                modalInfo.style.display = "none";
            }
        }
    </script>
    <footer class="footer">
        <p>Copyright © 2020 Powered by <a style="color: gray; text-decoration: none;" href="https://www.facebook.com/meou2731999" target="_blank">Quan Le</a>. All Rights Reserved.</p>
    </footer>
</body>


</html>