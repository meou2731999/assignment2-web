<div style="display: none;">
    <?php
    include('session.php');
    if (!isset($_SESSION['productPage'])|| $_SESSION['productPage'] <0) {
        $_SESSION['productPage'] = 1;
    }
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
        <a href="index.php" class="home button">
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
            <a href="index.php" class="home button" onclick="myFunctionForHome()">
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
        <div class="top_content">
            <img src="./img/architect.jpg" alt="architect" class="main_picture">
        </div>
        <div id="projects">
            <div class="sub_title">
                <h2>Dự án</h2>
            </div>
            <div class="projects_content">
                <?php
                // echo "day la session page".$_SESSION['productPage'];

                $result = mysqli_query($db, 'select count(id) as total from post');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];

                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 4;

                $total_page = ceil($total_records / $limit);

                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }

                // Tìm Start
                $start = ($current_page - 1) * $limit;

                $sql = "SELECT * FROM post ORDER BY id LIMIT " . $limit . " OFFSET " . $start;
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='sub_content' onclick='viewDetail(" . $row['id'] . ")'>
                                <img src='./img/" . $row['img'] . "' alt='house1' class='sub_picture'>
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
                <!-- pagination -->
                <?php
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<span>' . $i . '</span> | ';
                    } else {
                        echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
                    }
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
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
                            <img src='./img/" . $row['img'] . "' alt='team1' class='sub_picture about' style='height:300px; object-fit: none;        object-position: center;' >
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

    </div>
    <!-- Modal login -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin-top: 18px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin-top: 20px !important;">Đăng nhập</h2>
            </div>
            <div class="modal-body">
                <form action="login.php" method="POST" style="width: 100%;">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <div id="login_error" style="font-size:11px; color:#cc0000; margin-top:10px"></div>
                    <div style="display: flex;justify-content: space-between;">
                        <input type="submit" value="Đăng nhập">
                        <div class="signup-btn" onclick="openModalSignup()">Đăng ký</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal info -->
    <div id="myModalInfo" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin: 0px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin:0">Thông tin</h2>
            </div>
            <div class="modal-body">
                <div class="modal-left">
                    <?php echo "<img src='./img/" . $avatar . "'; style='width: 100%;height:auto;'>" ?>
                </div>
                <table class="modal-right">
                    <td>
                        <tr>
                            <td><label><b>UserName </b></label></td>
                            <td> <span><?php echo $login_session; ?></span></td>
                        </tr>
                        <tr>
                            <td><label><b>Mail </b> </label></td>
                            <td> <span><?php echo $email; ?></span></td>
                        </tr>
                        <tr>
                            <td><label><b>Birthday </b></label></td>
                            <td> <span><?php echo $birthday; ?></span></td>
                        </tr>
                        <tr>
                            <td><label><b>Phone number</b></label></td>
                            <td> <span><?php echo $phone; ?></span></td>
                        </tr>
                        <tr>
                            <td><label><b>Gender</b></label></td>
                            <td> <span><?php echo $gender; ?></span></td>
                        </tr>
                    </td>
                </table>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <?php echo $role == 1 ?
                    '<button class="signup-btn" onclick="openAdminManagement()">Quản lý</button>' : '';
                ?>
                <button class="signup-btn" onclick="openModalEditProfile()">Chỉnh sửa</button>
                <button class="signup-btn" onclick="window.location='logout.php';">Đăng xuất</button>
            </div>
        </div>
    </div>
    <!-- Modal sign up -->
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin-top: 18px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin-top: 20px !important;">Đăng ký</h2>
            </div>
            <div class="modal-body">
                <form action="signup.php" method="POST" style="width: 100%;" enctype="multipart/form-data">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="text" id="email" name="email" placeholder="Email">
                    <input type="date" id="birthday" name="birthday" placeholder="Birthday">
                    <input type="tel" pattern="[0-9]{10}" required id="phone" name="phone" placeholder="Phone">
                    <select name="gender" id="gender">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                    <input type="file" id="avatar" name="avatar" placeholder="Avatar">
                    <div id="signup_error" style="font-size:11px; color:#cc0000; margin-top:10px"></div>
                    <div style="display: flex;justify-content: center;">
                        <input type="submit" value="Đăng ký">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal edit info -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin-top: 18px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin-top: 20px !important;">Chỉnh sửa</h2>
            </div>
            <div class="modal-body">
                <form action="editprofile.php" method="POST" style="width: 100%;" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $userid_session; ?>">
                    <input type="text" id="username" name="username" value="<?php echo $login_session; ?>" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                    <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>">
                    <input type="tel" pattern="[0-9]{10}" required id="phone" name="phone" value="<?php echo $phone; ?>">
                    <select name="gender" id="gender">
                        <option value="Nam" <?php echo $gender == 'Nam' ? 'selected' : '' ?>>Nam</option>
                        <option value="Nữ" <?php echo $gender == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                        <option value="Khác" <?php echo $gender == 'Khác' ? 'selected' : '' ?>>Khác</option>
                    </select>
                    <input type="file" id="avatar" name="avatar" placeholder="Avatar">
                    <div style="display: flex;justify-content: center;">
                        <input type="submit" value="Lưu">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // navbar
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
            var x = document.getElementById("active_navbar");
            if (x.style.height === "196px") {
                myFunction();
            }
        }


        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        /********************************************/

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

        /********************************************/

        // Get the modal signup
        var modalSignup = document.getElementById("signupModal");

        // Get the <span> element that closes the modal
        var spanSignup = document.getElementsByClassName("close")[2];

        // When the user clicks the button, open the modal 
        openModalSignup = function() {
            modalSignup.style.display = "block";
        }


        // When the user clicks on <span> (x), close the modal
        spanSignup.onclick = function() {
            modalSignup.style.display = "none";
        }

        /********************************************/

        var modalEditProfile = document.getElementById("editProfileModal");

        // Get the <span> element that closes the modalEditProfile
        var spanEditProfile = document.getElementsByClassName("close")[3];

        // When the user clicks the button, open the modalEditProfile 
        openModalEditProfile = function() {
            modalEditProfile.style.display = "block";
            myFunction();
        }


        // When the user clicks on <span> (x), close the modalEditProfile
        spanEditProfile.onclick = function() {
            modalEditProfile.style.display = "none";
        }

        /********************************************/

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modalInfo) {
                modalInfo.style.display = "none";
            }
            if (event.target == modalSignup) {
                modalSignup.style.display = "none";
            }
            if (event.target == modalEditProfile) {
                modalEditProfile.style.display = "none";
            }
        }

        function openAdminManagement() {
            window.location = 'admin.php';
        }

        function viewDetail(id) {
            var path = "product.php?id=" + id.toString();
            window.location = path;
        }

        
    </script>

    <footer style="width: 100%;">
        <div class="footer">Copyright © 2020 Powered by <a style="color: gray; text-decoration: none; margin-left: 5px;" href="#" target="_blank">Bach Khoa
                University</a>
        </div>
    </footer>
</body>
<?php
if (isset($_SESSION['login_error']) & (!isset($_SESSION['login_user']))) {
    echo "<script type='text/javascript'>
        openModal();
        document.getElementById('login_error').innerHTML = 'Your Login Name or Password is invalid !';
        </script>";
}
if (isset($_SESSION['signup_error']) & (!isset($_SESSION['login_user']))) {
    echo "<script type='text/javascript'>
        openModalSignup();
        document.getElementById('signup_error').innerHTML = 'Fill all value !';
        </script>";
}
if (isset($_SESSION['signup_success']) & (!isset($_SESSION['login_user']))) {
    echo "<script type='text/javascript'>
        alert('Signup success!');
        </script>";
}
unset($_SESSION['login_error']);
unset($_SESSION['signup_error']);
unset($_SESSION['signup_success']);
?>

</html>