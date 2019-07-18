<?php





class CategoryController {
    public function actionIndex($category_id, $page=1) {
        if($category_id=='all'){
            $category_id=NULL;
        }
         $username= User::getUserName();
        $priceRange= Product::getPrices($category_id);
        $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $allProducts=array();
        $productsCart=array();
        $productsCart=Cart::ProductsinCart();
        $totall=array();
        $totall=Cart::total();
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
    
    public function actionFilter($category_id, $page=1) {
        if($category_id=='all'){
            $category_id=NULL;
        }
        $filt=1;
         $username= User::getUserName();
        $priceRange= Product::getPrices($category_id);
       $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $allProducts=array();
        $productsCart=array();
        $productsCart=Cart::ProductsinCart();
        $totall=array();
        $totall=Cart::total();
        $allProducts= Product::getFilteredProducts($category_id, $page);
        $productsByFirm=array();
        $productsByFirm= Product::getProductsByFirm($category_id);
        $productsByPrice=array();
        $productsByPrice= Product::getProductsByPrice($category_id);
        $total= Product::getCountFiltered($category_id);
        $pagination=new Pagination($total, $page, 6, 'page-');
       
        
        require_once(ROOT . '/views/category/index.php');

      
        return true;
       
        
    }
        public function actionSearch($page=1) {

         $username= User::getUserName();
        $priceRange= Product::getPrices();
       $categories=array();
        $categories=Category::getCategoriesList();
        $blogCategories=array();
        $blogCategories=BlogArticles::getBlogCategoriesList();
        $allProducts=array();
        $productsCart=array();
        $productsCart=Cart::ProductsinCart();
        $totall=array();
        $totall=Cart::total();
        $allProducts= Product::getSearchedProducts($page);
        $productsByFirm=array();
        $productsByFirm= Product::getProductsByFirm();
        $productsByPrice=array();
        $productsByPrice= Product::getProductsByPrice();
        $total= Product::getCountSearched();
        $pagination=new Pagination($total, $page, 6, 'page-');
       
        
        require_once(ROOT . '/views/category/index.php');

      
        return true;
       
        
    }
}
