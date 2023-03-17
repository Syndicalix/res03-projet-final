<?php  
 
class ShopController extends AbstractController {  
  
    private ProductManager $pm;  
    private CategoryManager $cm;  
  
    public function __construct()  
    {  
    $this->pm = new ProductManager();  
    $this->cm = new CategoryManager();
    }  
    
    /* Pour la route de la home */  
    public function categoriesList() : void  
    {  
       $categories = $this->cm->getAllCategories();  // à remplacer par un appel au manager pour récupérer la liste des catégories  
      var_dump($categories);
        $this->render("index", [  
            "categories" => $categories  
        ]);  
    }
        /* Pour la route /categories/:slug-categorie */  
    public function productsInCategory(string $categorySlug) : void  
    {  
        $products = $this->pm->getProductsByCategorySlug($categorySlug); // à remplacer par un appel au manager pour récupérer la liste des produits d'une catégorie  

        $this->render("category", [  
            "products" => $products,
            "category" => $categorySlug
        ]);  
    }
        /* Pour la route /categories/produits */  
    public function productsList() : void  
    {  
        $products = $this->pm->getAllProducts();// à remplacer par un appel au manager pour récupérer la liste de tous les produits  
      
        $this->render("products", [  
            "products" => $products  
        ]);  
    }
        /* Pour la route /produits/:slug-produit */  
    public function productDetails(string $productSlug) : void  
    {  
        $product = $this->pm->getProductBySlug($productSlug); // à remplacer par un appel au manager pour récupérer les informations d'un produit  
        $categories = $this->cm->getCategoriesByProductSlug($productSlug);
        $this->render("product", [  
            "product" => $product, 
            "categories" => $categories
        ]);  
    }
}