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
    <title>Int House Building - Admin Management</title>
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
        <a href="#products" class="button">
            Sản phẩm
        </a>
        <a href="#users" class="button">
            Người dùng
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
            <a href="#users" class="button" onclick="myFunction()">
                Người dùng
            </a>
            <a href="#products" class="button" onclick="myFunction()">
                Sản phẩm
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
            <div class="sub_title">
                <h2>Người dùng</h2>
            </div>
            <div class="projects_content">
                <table id="admin">
                    <tr>
                        <th>Tên đăng nhập</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Thao tác</th>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                        <td>Christina Berglund</td>
                        <td>Sweden</td>
                        <td style="text-align: center;">
                            <button class="button_edit" onclick="openModalEditProfile()">Edit</button>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div id="users">
            <div class="sub_title">
                <h2>Sản phẩm</h2>
            </div>
            <div class="projects_content">
                <button class="signup-btn" onclick="openModalAddProducts()">Thêm sản phẩm</button>
                <table id="admin">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Địa chỉ</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Người đăng</th>
                        <th>Thao tác</th>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                        <td>Christina Berglund</td>
                        <td>Sweden</td>
                        <td>Christina Berglund</td>
                        <td style="text-align: center;">
                            <button class="button_edit" onclick="openModalEditProducts()">Edit</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
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
                    <input type="text" id="username" name="username" placeholder="<?php echo $login_session; ?>" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="text" id="email" name="email" placeholder="<?php echo $email; ?>">
                    <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>">
                    <input type="tel" pattern="[0-9]{10}" required id="phone" name="phone" placeholder="<?php echo $phone; ?>">
                    <select name="gender" id="gender">
                        <option value="Nam" <?php echo $gender == 'Nam' ? 'selected' : '' ?>>Nam</option>
                        <option value="Nữ" <?php echo $gender == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                        <option value="Khác" <?php echo $gender == 'Khác' ? 'selected' : '' ?>>Khác</option>
                    </select>
                    <input type="file" id="avatar" name="avatar" placeholder="Avatar">
                    <div style="display: flex;justify-content: center;">
                        <input type="submit" value="Lưu">
                        <button class="signup-btn">Xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="editProductsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin-top: 18px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin-top: 20px !important;">Chỉnh sửa</h2>
            </div>
            <div class="modal-body">
                <form action="editproduct.php" method="POST" style="width: 100%;" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $userid_session; ?>">
                    <input type="text" id="title" name="title" placeholder="<?php echo $login_session; ?>" required>
                    <input type="text" id="category" name="category" placeholder="<?php echo $category; ?>">
                    <input type="text" id="address" name="address" value="<?php echo $address; ?>">
                    <textarea name="content" rows="10"><?php echo $category; ?></textarea>
                    <input type="number" id="cost" name="cost" placeholder="<?php echo $cost; ?>">
                    <input type="file" id="img" name="img" placeholder="Picture">
                    <div style="display: flex;justify-content: center;">
                        <input type="submit" value="Lưu">
                        <button class="signup-btn">Xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="addProductsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="button" style="margin-top: 18px;">
                    <span class="close">&times;</span>
                </div>
                <h2 style="margin-top: 20px !important;">Tạo mới</h2>
            </div>
            <div class="modal-body">
                <form action="editproduct.php" method="POST" style="width: 100%;" enctype="multipart/form-data">
                    <input type="text" id="title" name="title" placeholder="Tên sản phẩm" required>
                    <input type="text" id="category" name="category" placeholder="Danh mục sản phẩm">
                    <input type="text" id="address" name="address" placeholder="Địa chỉ">
                    <textarea name="content" rows="10" placeholder="Nội dung mô tả sản phẩm"></textarea>
                    <input type="number" id="cost" name="cost" placeholder="Giá trị sản phẩm">
                    <input type="file" id="img" name="img" placeholder="Hình ảnh sản phẩm">
                    <div style="display: flex;justify-content: center;">
                        <input type="submit" value="Lưu">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("active_navbar");
            if (x.style.height === "157px") {
                document.getElementById("fa-bars").style.display = "unset";
                document.getElementById("fa-times").style.display = "none";
                x.style.height = "0px";
            } else {
                x.style.height = "157px";
                document.getElementById("fa-bars").style.display = "none";
                document.getElementById("fa-times").style.display = "unset";
            }
        }

        function myFunctionForHome() {
            var x = document.getElementById("active_navbar");
            if (x.style.height === "157px") {
                document.getElementById("fa-bars").style.display = "unset";
                document.getElementById("fa-times").style.display = "none";
                x.style.height = "0px";
            }
        }

        var modalEditProfile = document.getElementById("editProfileModal");

        // Get the <span> element that closes the modalEditProfile
        var spanEditProfile = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modalEditProfile 
        openModalEditProfile = function() {
            modalEditProfile.style.display = "block";
            myFunction();
        }


        // When the user clicks on <span> (x), close the modalEditProfile
        spanEditProfile.onclick = function() {
            modalEditProfile.style.display = "none";
        }

        var modalEditProducts = document.getElementById("editProductsModal");

        // Get the <span> element that closes the modalEditProducts
        var spanEditProducts = document.getElementsByClassName("close")[1];

        // When the user clicks the button, open the modalEditProducts 
        openModalEditProducts = function() {
            modalEditProducts.style.display = "block";
            myFunction();
        }
        // When the user clicks on <span> (x), close the modalEditProducts
        spanEditProducts.onclick = function() {
            modalEditProducts.style.display = "none";
        }

        var modalAddProducts = document.getElementById("addProductsModal");

        // Get the <span> element that closes the modalAddProducts
        var spanAddProducts = document.getElementsByClassName("close")[2];

        // When the user clicks the button, open the modalAddProducts 
        openModalAddProducts = function() {
            modalAddProducts.style.display = "block";
            myFunction();
        }
        // When the user clicks on <span> (x), close the modalAddProducts
        spanAddProducts.onclick = function() {
            modalAddProducts.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modalEditProfile) {
                modalEditProfile.style.display = "none";
            }
            if (event.target == modalEditProducts) {
                modalEditProducts.style.display = "none";
            }
            if (event.target == modalAddProducts) {
                modalAddProducts.style.display = "none";
            }
        }
    </script>
</body>

</html>