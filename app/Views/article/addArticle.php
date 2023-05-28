<?php

$conn = DBConnection::getConnection();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  if($conn != null){
    
    //validate input
    if (empty(trim($_POST['title'])) || empty(trim($_POST['summary'])) || empty(trim($_POST['content'])) || $_POST['category_id'] ==0 ||$_POST['member_id'] ==0 ||empty(trim($_POST['image_alt'])) || strlen($_FILES['image']['name'])==0 ) {
      echo "<script>alert('Vui lòng nhập đầy đủ thông tin.');</script>";
  }else{
    $stmt =$conn->prepare("SELECT max(id) from image"); //add new image in database
    $stmt->execute();
    $row = $stmt->fetch();
    $id_image= $row['max(id)'] +1 ;
    
    $stmt_addImage =$conn->prepare("INsert into `image` (`file`, `alt`) value(:file,:alt)");
    $stmt_addImage->bindParam(":file",$_FILES['image']['name']);
    $stmt_addImage->bindParam(":alt",$_POST['image_alt']);
    $stmt_addImage->execute();
    header("Location: ?controller=article&action=add&id_image={$id_image}");



  }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Thêm bài viết</title>
</head>

<body>
  <h2 class="text text-center text-primary">Add new article</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <main class=" admin row" id="content">

      <section class="image col-4">
        <label for="image">Upload image:</label>
        <div class="form-group image-placeholder">
          <input type="file" name="image" class="form-control-file" id="image"><br>
          <span class="errors"></span>
        </div>
        <div class="form-group">
          <label for="image_alt">Alt text: </label>
          <input type="text" name="image_alt" id="image_alt" value="" class="form-control">
        </div>
      </section>

      <section class="my-5 col-7 align-center">
        <div class="form-group">
          <label for="title">Title: </label>
          <input type="text" name="title" id="title" value="" class="form-control">
          <span class="errors"></span>
        </div>
        <div class="form-group">
          <label for="summary">Summary: </label>
          <textarea name="summary" id="summary" class="form-control"></textarea>
          <span class="errors"></span>
        </div>
        <div class="form-group">
          <label for="content">Content: </label>
          <textarea name="content" id="content" class="form-control"></textarea>
          <span class="errors"></span>
        </div>
        <div class="row mt-4">
          <div class="form-group col-4">
            <label for="member_id">Author: </label>
            <select name="member_id" id="member_id">
              <option disabled selected>-Chọn tác giả-</option>
              <?php
         
                if($conn != null){
                    $stmt_showMember = $conn->prepare("SELECT id,forename,surname from member order by id asc");
                    $stmt_showMember->execute();
                    $result = $stmt_showMember->fetchAll(PDO::FETCH_ASSOC);
            
                    foreach ($result as $row) {
                        $fullName = $row['forename'] . ' ' . $row['surname'];
                        echo "<option value='{$row["id"]}'>$fullName</option>";
                    }

                }
              ?>

            </select>
          </div>

          <div class="form-group col-4">
            <label for="category">Category: </label>
            <select name="category_id" id="category">
              <option disabled selected>Chọn thể loại</option>
              <?php
         
                if($conn != null){
                    $stmt_showCategory = $conn->prepare("SELECT id, name from category order by id asc");
                    $stmt_showCategory->execute();
                    $result = $stmt_showCategory->fetchAll(PDO::FETCH_ASSOC);
            
                    foreach ($result as $row) {
              
                      echo "<option value='{$row["id"]}'>{$row["name"]}</option>";
                    }

                }
              ?>

            </select>
          </div>
          <div class="form-check col-4">
            <input type="checkbox" name="published" value="1" class="form-check-input" id="published">
            <label for="published" class="form-check-label">Published</label>
          </div><input type="submit" name="update" value="Save" class="btn mt-5 btn-primary">
        </div>

      </section><!-- /.text -->

    </main>
  </form>



</body>

</html>