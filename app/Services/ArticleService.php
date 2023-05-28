<?php
require_once APP_ROOT.'/app/Models/Article.php';
require_once APP_ROOT.'/app/Config/DBConnect.php';
class ArticleService {
  
    // Chứa các hàm tương tác và xử lý dữ liệu
    public function getAllArticles(){
        // Bước 01: Kết nối DB Server
        $conn = DBConnection::getConnection();
        // Bước 02: Truy vấn DL
        if($conn != null){
            $stmt = $conn->prepare("SELECT * FROM article ORDER BY created desc");
            $stmt->execute();
           
               // Bước 03: Tạo danh sách các đối tượng Article
               $articles = array();
               while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                   $article = new Article($row['id'],$row['title'],$row['summary'],$row['content'],$row['created'],$row['category_id'],$row['member_id'],$row['image_id'],$row['published']);
                   $articles[] = $article;
               }
               // Bước 04: Trả về mảng các đối tượng Article
               return $articles;

        }
     
    }
    
    public function add($title,$summary,$content,$created,$category_id,$member_id,$image_id,$published)
    {
     // Bước 01: Kết nối DB Server
     $conn =DBConnection::getConnection();
        if($conn != null){
             // Bước 02: Truy vấn DL
        $sql = "INSERT INTO `article` ( `title`, `summary`, `content`, `created`, `category_id`, `member_id`, `image_id`, `published`) VALUES
        (:id,:title,:summary,:content,:created,:category_id,:member_id,:image_id,:published)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title',$title,PDO::PARAM_STR);
        $stmt->bindParam(':summary',$summary,PDO::PARAM_STR);
        $stmt->bindParam(':content',$content,PDO::PARAM_STR);
        $stmt->bindParam(':created',$created,PDO::PARAM_STR);
        $stmt->bindParam(':category_id',$category_id,PDO::PARAM_INT);
        $stmt->bindParam(':member_id',$member_id,PDO::PARAM_INT);
        $stmt->bindParam(':image_id',$image_id,PDO::PARAM_INT);
        $stmt->bindParam(':published',$published,PDO::PARAM_INT);

        try{
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }

        }
       
    }
    public function update($id,$title,$summary,$content,$created,$category_id,$member_id,$image_id,$published)
    {
       // Bước 01: Kết nối DB Server
       $conn =DBConnection::getConnection();
        if($conn != null){
            $sql = "UPDATE  article 
            set title=:title,
                summary=:summary,
                content=:content,
                created=:created,
                category_id=:category_id,
                member_id=:member_id,
                image_id=:image_id,
                published=:publised
            Where id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->bindParam(':title',$title,PDO::PARAM_STR);
            $stmt->bindParam(':summary',$summary,PDO::PARAM_STR);
            $stmt->bindParam(':content',$content,PDO::PARAM_STR);
            $stmt->bindParam(':created',$created,PDO::PARAM_STR);
            $stmt->bindParam(':category_id',$category_id,PDO::PARAM_INT);
            $stmt->bindParam(':member_id',$member_id,PDO::PARAM_INT);
            $stmt->bindParam(':image_id',$image_id,PDO::PARAM_INT);
            $stmt->bindParam(':published',$published,PDO::PARAM_INT);
            $stmt->execute();

            try{
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
        // Bước 02: Truy vấn DL
       
    }
    public function delete($id)
    { // Bước 01: Kết nối DB Server
        $conn =DBConnection::getConnection();
        if($conn != null){
             // Bước 02: Truy vấn DL
        $sql = "DELETE from  article Where id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        try{
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
        }
       
    }  
}


?>