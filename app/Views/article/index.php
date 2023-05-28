
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
    <script src="<?= APP_ROOT.'/public/js/bootstrap.min.js'?>" ></script>


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