git push -u origin main<?php
require_once ('backend/db.php');
$sqlcategory="select * from tblcategory";
$qurycategory=mysqli_query($conn,$sqlcategory);
?>
<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Admin Page</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
          href="https://belteigroup.com.kh/images/beltei_international_university_in_cambodia.png"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
</head>

<body>
<div class="container content-wrapper">
    <!-- Content -->

    <div class="container-fluid flex-grow-1 container-p-y">
        <?php
        if(isset($_GET['msg'])){
            $msg=$_GET['msg'];
            echo'<div class="alert alert-primary" role="alert">
                        '.$msg.'</div';}
        ?>
        <!-- Bootstrap Table with Header - Light -->
        <form action="backend/input.php" enctype="multipart/form-data" method="post">
            <div class="card">

                <div class="card card-body">
                    <h1 class="text-center">Phone Shop Admin</h1>

                    <div class="row">

                        <div class="col">
                            <label for="">Category Name</label>
                            <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                                    ><i class="bx bx-user"></i
                                                        ></span>
                                <select name="selectCategory"  type="text"  class="form-control">
                                    <?php while ($category=mysqli_fetch_assoc($qurycategory)){?>
                                        <option value="<?php echo $category['ID']?>"><?php echo $category['Name']?></option><?php }?>
                                </select>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col">
                                <label for="">Phone Name</label>
                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                                    ><i class="bx bx-user"></i
                                                        ></span>
                                    <input
                                        name="phone_name"
                                        type="text"
                                        id=""
                                        class="form-control"
                                        placeholder="News_Title"
                                    />
                                </div>
                            </div>
                            <div class="col">
                                <label for="">Price</label>
                                <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                                    ></span>
                                    <input
                                            name="price"
                                            type="text"
                                            id=""
                                            class="form-control"
                                            placeholder="Price"
                                    />

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <label for="">Feature</label>
                                <div class="input-group input-group-merge" style="height: 100px;">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"
                                                    ><i class="bx bx-user"></i
                                                        ></span>
                                    <input
                                        maxlength="600"
                                        name="feature"
                                        type="text"
                                        id=""
                                        class="form-control"
                                        placeholder=""
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Cover Image</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-user"></i>
                                    </span>
                                    <input
                                            name="CoverImage"
                                            type="file"
                                            class="form-control"
                                    />
                                </div>
                            </div>
                            <div class="col">
                                <label for="">More Image</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-user"></i>
                                    </span>
                                    <input
                                            name="file[]"
                                            type="file"
                                            multiple
                                            class="form-control"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col align-items-center">
                                <input type="Submit" name="Submit" class="submit btn btn-success" value="Submit" />
                                <a type="button" href="index.php"  class="btn btn-outline-danger">Cancel</a>
                            </div>
                        </div>


                    </div>

                </div>

                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
</form>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>