<?php
require_once APP_ROOT.'/app/Services/ArticleService.php';
    class ArticleController{
        private $articleService;
        public function __construct(){
            $this->articleService = new ArticleService();
        }
 
     
        public function index(){
       
          
            // Tương tác với Services/Models
            $articles= $this->articleService->getAllArticles();
           
           include APP_ROOT.'/app/Views/article/index.php';
          
        }
        public function add(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $publish= isset($_POST['published'])? 1:0;
                $this->articleService->add($_POST['title'],$_POST['summary'],$_POST['content'],date('Y-m-d H:i:s'),$_POST['category_id'],$_POST['member_id'],$_GET['id_image'],$publish);
                return $this->index();
            }
            include APP_ROOT.'/app/Views/article/addArticle.php';
        }
        public function update(){
            include APP_ROOT.'/app/Views/article/updateArticle.php';
        }
        public function delete(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->articleService->delete($_GET['articleID']);
                return $this->index();
            }
            include APP_ROOT.'/app/Views/article/deleteArticle.php';
        }
    }

?>