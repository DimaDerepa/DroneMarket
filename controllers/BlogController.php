<?php





class BlogController {
    public function actionIndex($category=NULL,$page=1) {
        if($category=='all'){
            $category=NULL;
        }
         $productsCart=Cart::ProductsinCart();
         User::SaveEmail();
         $username= User::getUserName();
          $totall=Cart::total();
        $articles=array();
        $articles= BlogArticles::getArticleList($category,$page);
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $comments=array();
        $comments= BlogArticles::getCountComments();
        $products=array();
        $products= Product::getRecomendedProductsList();
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $total=BlogArticles::getArticleCount($category);
         $pagination=new Pagination($total, $page, 2, 'page-');
        require_once(ROOT . '/views/blog/index.php');

        return true;
    }
      public function actionView($id) {
          Comments::deleteComment();
          Comments::saveCommentBlog($id);
        $article=array();
        $commentInfo= Comments::getBlogComments($id);
         $productsCart=Cart::ProductsinCart();
         User::SaveEmail();
         $username= User::getUserName();
        $article = BlogArticles::getArticle($id);
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $comments=array();
        $comments= BlogArticles::getCountComments();
        $products=array();
        $products= Product::getRecomendedProductsList();
  $totall=Cart::total();
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        require_once(ROOT . '/views/blog/view.php');
       
        
        return true;
        
    }
public function actionSearch($page=1) {
        $totall=Cart::total();
         $productsCart=Cart::ProductsinCart();
         User::SaveEmail();
         $username= User::getUserName();
        $articles=array();
        $articles= BlogArticles::getSearchedArticleList($page);
        $authors=array();
        $authors= BlogArticles::getAuthorName();
        $comments=array();
        $comments= BlogArticles::getCountComments();
        $products=array();
        $products= Product::getRecomendedProductsList();
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $total=BlogArticles::getCountSearched();
         $pagination=new Pagination($total, $page, 2, 'page-');
        require_once(ROOT . '/views/blog/index.php');

        return true;
    }
 
}
