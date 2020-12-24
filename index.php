<div style="display: none;">
    <?php
    include('session.php');
    ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Int House Building - Homepage</title>
    <link rel="icon" href="./img/logo.ico" sizes="32x32" />
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class=" main_content">
        <div class="top_content">
            <img src="./img/architect.jpg" alt="architect" class="main_picture">
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
                                    <span>" . (string)($row['cost'] / 1000000) . "tr.VND</span>
                                </div>
                            </div>";
                    }
                }
                ?>
            </div>
            <div id="about">
                <div class="sub_title">
                    <h2>Giới thiệu</h2>
                    <h4>CHÀO MỪNG BẠN ĐẾN VỚI NHÀ ĐẸP SÀI GÒN</h4>
                    <p>Hãy để chúng tôi chào đón bạn bằng một câu chuyện mộc mạc về sự khởi nghiệp khiêm tốn của
                        chúng
                        tôi vào những ngày trước khi về căn nhà NHÀ ĐẸP SÀI GÒN của năm 2005 về trước. Như mọi
                        thương
                        hiệu và công ty tên tuổi khác, chúng tôi tồn
                        tại nhờ tuân thủ những nguyên tắc cơ bản trong kinh doanh, đạo đức nghề nghiệp, tôn
                        trọng khách
                        hàng và sự hợp pháp.</p>

                    <p>Khởi đầu tuy nhỏ bé nhưng chúng tôi ấp ủ một hoài bão lớn. Với tầm nhìn là sáng tạo ra
                        những giải
                        pháp và dịch vụ chuyên nghiệp có thể mang đến/giúp cải thiện cuộc sống, cũng như hoạt
                        động kinh
                        doanh của khách hàng. Các dịch vụ này phải
                        thật sự đáp ứng – thoả mãn được nhu cầu thực tế.</p>
                </div>
                <div class="projects_content">
                    <?php
                    $sql = "SELECT * FROM employee ORDER BY id  LIMIT 4 OFFSET 0";
                    $result = mysqli_query($db, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='sub_content'>
                            <img src='./" . $row['img'] . "' alt='team1' class='sub_picture'>
                            <h3>" . $row['name'] . "</h3>
                            <h4>" . $row['position'] . "</h4>
                            <a href='mailto:" . $row['email'] . "' class='button about'>Liên hệ</a>
                            </div>";
                        }
                    }
                    ?>

                </div>
            </div>
            <div id="contact">
                <div class="sub_title">
                    <h2>Liên hệ</h2>
                    <p>Hãy liên hệ và nói về căn nhà mong ước của bạn.</p>
                    <form action="/index.html" method="POST">
                        <input type="text" id="name" name="name" placeholder="Name">
                        <input type="text" id="email" name="email" placeholder="Email">
                        <input type="text" id="subject" name="subject" placeholder="Subject">
                        <input type="text" id="comment" name="comment" placeholder="Comment">
                        <select>
                            <option value="HoChiMinh">HoChiMinh</option>
                            <option value="Danang">Danang</option>
                            <option value="Hanoi">Hanoi</option>
                        </select>
                        <input type="submit" value="Gửi">

                        <p>Gặp chúng tôi ở đâu?</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31354.705739052497!2d106.747735!3d10.785387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525dfec79e4e1%3A0x77b53e09e96c8eee!2zTm92YWxhbmQgVGhlIFN1biBBdmVudWUsIDI4IMSQxrDhu51uZyBNYWkgQ2jDrSBUaOG7jSwgQW4gUGjDuiwgUXXhuq1uIDIsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v1597373886063!5m2!1svi!2sus" height="450" frameborder="0" style="border:0;width: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </form>
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
                if (x.style.height === "196px") {
                    document.getElementById("fa-bars").style.display = "unset";
                    document.getElementById("fa-times").style.display = "none";
                    x.style.height = "0px";
                } else {
                    x.style.height = "196px";
                    document.getElementById("fa-bars").style.display = "none";
                    document.getElementById("fa-times").style.display = "unset";
                }
            }

            function myFunctionForHome() {
                var x = document.getElementById("active_navbar");
                if (x.style.height === "196px") {
                    document.getElementById("fa-bars").style.display = "unset";
                    document.getElementById("fa-times").style.display = "none";
                    x.style.height = "0px";
                }
            }
            // Get the modal
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

        <footer style="width: 100%;">
            <div class="footer">Copyright © 2020 Powered by <a style="color: gray; text-decoration: none; margin-left: 5px;" href="#" target="_blank">Bach Khoa
                    University</a>
            </div>
        </footer>
</body>

</html>