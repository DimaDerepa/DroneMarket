<?php





class CategoryController {
    public function actionIndex($category_id=NULL, $page=1) {
        
      
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $allProducts=array();
   
        $allProducts= Product::getProductsByCategory($category_id, $page);
        $productsByFirm=array();
        $productsByFirm= Product::getProductsByFirm($category_id);
        $productsByPrice=array();
        $productsByPrice= Product::getProductsByPrice($category_id);
        $total= Product::getCountProducts($category_id);
        $pagination=new Pagination($total, $page, 6, 'page-');
        require_once(ROOT . '/views/category/index.php');

        return true;
       
        
    }
     public function actionView($page=1) {
        
      
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $allProducts=array();
   
        $allProducts= Product::getProductsByCategory($category_id=NULL, $page);
        $productsByFirm=array();
        $productsByFirm= Product::getProductsByFirm($category_id=NULL);
        $productsByPrice=array();
        $productsByPrice= Product::getProductsByPrice($category_id=NULL);
        $total= Product::getCountProducts($category_id=NULL);
        $pagination=new Pagination($total, $page, 6, 'page-');
        require_once(ROOT . '/views/category/index.php');
        return true;
       
        
    }
}
