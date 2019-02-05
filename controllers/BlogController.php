<?php





class BlogController {
    public function actionIndex() {
        $articles=array();
        $articles= BlogArticles::getArticleList();
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $comments=array();
        $comments= BlogArticles::getCountComments();
        $products=array();
        $products= Product::getRecomendedProductsList();
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=Category::getBlogCategoriesList();
        require_once(ROOT . '/views/blog/index.php');
        return true;
    }
      public function actionView($id) {
        $article=array();
        $article = BlogArticles::getArticle($id);
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $comments=array();
        $comments= BlogArticles::getCountComments();
        $products=array();
        $products= Product::getRecomendedProductsList();
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=Category::getBlogCategoriesList();
        require_once(ROOT . '/views/blog/view.php');
        return true;
        
    }
 
}
