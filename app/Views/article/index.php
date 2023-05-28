
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= APP_ROOT.'/public/css/bootstrap.min.css'?>">
    <script src="<?= APP_ROOT.'/public/js/bootstrap.min.js'?>" ></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

   <title>Bài báo</title>
</head>

<body>
    <h2 class="text text-center text-primary">Article Page</h2>
    <a href="?controller=article&action=add" class="btn btn-success mt-5 mb-5 p-2">Add new Article</a>
      <!-- Table view data -->
      <table class="table">
        <thead>
            <tr>
            <th scope="col">Image_id</th>
                <th scope="col">Title</th>
                <th scope="col">Created</th>
                <th scope="col">Published</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        
            foreach ($articles as $article) {
                echo "<tr>";
                echo "<td>" . $article->getImage_id() . "</td>";
                echo "<td>" . $article->getTitle() . "</td>";
                echo "<td>" . $article->getCreated() . "</td>";
                echo "<td>" . $article->getPublished() . "</td>";
                echo "<td><a href='?controller=article&action=update&articleID=".$article->getId() ."'><i class=\"bi bi-pencil-square\"></i></a></td>";
                echo "<td><a href='?controller=article&action=delete&articleID=".$article->getId() ."'><i class=\"bi bi-trash3\"></i></a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
    
</body>

</html>