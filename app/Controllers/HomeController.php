<?php
require_once APP_ROOT.'/app/Services/ArticleService.php';
    class HomeController{
 
     
        public function index(){
            // Tương tác với Services/Models
            $articleService=new ArticleService();
            $articles= $articleService->getAllArticles();
            // Tương tác với View
            require APP_ROOT.'/app/Views/home/index.php';
        }
    }

?>