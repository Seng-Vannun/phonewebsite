<?php
require_once ('db.php');
if(isset($_POST['Submit'])) {
    $category = $_POST['selectCategory'];
    $phoneName = $_POST['phone_name'];
    $price = intval($_POST['price']);
    $feature=$_POST['feature'];
    $phoneQuery = "insert into `tblproduct` (`Name`,`Price`,`CategoryID`) values ('$phoneName','$price','$category')";
    if (mysqli_query($conn, $phoneQuery)) {
        $sqlproduct="select *  from tblproduct ORDER BY ID DESC limit 1";
        $sqlresultproduct=mysqli_query($conn,$sqlproduct);
        $productID=null;
        if($product=mysqli_fetch_assoc($sqlresultproduct)){
            $productID=$product['ID'];
        }
        //cover Image
        $coverImage=date("Ymdhis").$_FILES['CoverImage']['name'];
        $coverImageTemp=$_FILES['CoverImage']['tmp_name'];
        $coverPath="../img/".$coverImage;
        if(move_uploaded_file($coverImageTemp,$coverPath)){
            $insertCoverImage="insert into `tblcoverimage` (`image_url`,`ProductID`) values ('$coverImage','$productID')";
            $Coverqurry=mysqli_query($conn,$insertCoverImage);
            if(!$Coverqurry)
            {
                echo ("error".$Coverqurry.":-">mysqli_error($conn));
            }
        }
        $sqlfeature="insert into `tblfeature` (`Name`,`ProductID`) values ('$feature','$productID')";
        $featurequrry=mysqli_query($conn,$sqlfeature);
        if(!$featurequrry)
        {
            echo ("error".$featurequrry.":-">mysqli_error($conn));
        }
        //moreImage
        $imageCount=count($_FILES['file']['name']);
        for($i=0;$i<$imageCount;$i++){
            $image= date("Ymdhis").$_FILES['file']['name'][$i];
            $imageTemp=$_FILES['file']['tmp_name'][$i];
            $path="../img/".$image;
            if(move_uploaded_file($imageTemp,$path))
            {
                $insertImage="insert into `tblimage` (`image_url`,`ProductID`) values ('$image','$productID')";
                if($qurry=mysqli_query($conn,$insertImage))
                {
                    header("Location: ../admin.php?msg=Added Succesfully");
                }
                else{ echo "Error: ".$qurry.":-">mysqli_error($conn);}
            }

        }
    } else {
        echo("Error" . $phoneQuery . ":-" . mysqli_error($conn));
    }

}
