<?php  
 
class Router {  
    private ShopController $ctrl;
    private AuthController $auth; 
  
    public function __construct()  
        {  
            $this->ctrl = new ShopController();
            $this->auth = new AuthController(); 
        }
    private function splitRouteAndParameters(string $route) : array  
        {  
            $routeAndParams = [];  
            $routeAndParams["route"] = null;  
            $routeAndParams["categorySlug"] = null;  
            $routeAndParams["productSlug"] = null;  
            
            
            if(strlen($route) > 0) // si la chaine de la route n'est pas vide (donc si ça n'est pas la home)  
            {  
                $tab = explode("/", $route);  
          
                if($tab[0] === "categories") // écrire une condition pour le cas où la route commence par "categories"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = "categories";  
                    $routeAndParams["categorySlug"] = $tab[1];  
                }  
                else if($tab[0] === "produits") // écrire une condition pour le cas où la route commence par "produits"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = "produits";
                    if (isset($tab[1])){
                        
                    $routeAndParams["productSlug"] = $tab[1]; 
                    }
                }
                else if($tab[0] === "creer-un-compte") // écrire une condition pour le cas où la route commence par "creer-un-compte"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }  
                else if($tab[0] === "check-creer-un-compte") // écrire une condition pour le cas où la route commence par "check-creer-un-compte"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }  
                else if($tab[0] === "connexion") // écrire une condition pour le cas où la route commence par "connexion"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }  
                else if($tab[0] === "check-connexion") // écrire une condition pour le cas où la route commence par "check-connexion"  
                {  
                    // mettre les bonnes valeurs dans le tableau  
                    $routeAndParams["route"] = $tab[0];  
                }
            }
            
            else  
            {  
                $routeAndParams["route"] = "";  
            }  
          
            return $routeAndParams;  
        }
        public function checkRoute(string $route) : void  
    {  
        $routeTab = $this->splitRouteAndParameters($route);
        
    
        if($routeTab['route'] === "") // condition(s) pour envoyer vers la home  
        {  
            // appeler la méthode du controlleur pour afficher la home
            $this->ctrl->categoriesList();
        }  
        else if($routeTab['route'] === "produits" && $routeTab['productSlug'] === null) // condition(s) pour envoyer vers la liste des produits  
        {  
            // appeler la méthode du controlleur pour afficher les produits
            $this->ctrl->productsList();
        }  
        else if($routeTab['route'] === "categories" && $routeTab['categorySlug'] !== null) // condition(s) pour envoyer vers la liste des produits d'une catégorie  
        {  
            // appeler la méthode du controlleur pour afficher les produits d'une catégorie
            $this->ctrl->productsInCategory($routeTab['categorySlug']);  
        }  
        else if($routeTab['route'] === "produits" && $routeTab['productSlug'] !== null) // condition(s) pour envoyer vers le détail d'un produit  
        {  
            // appeler la méthode du controlleur pour afficher le détail d'un produit
            $this->ctrl->productDetails($routeTab['productSlug']);
        }
        else if($routeTab["route"] === "creer-un-compte") // condition pour afficher la page du formulaire d'inscription  
        {  
            $this->auth->register();// appeler la méthode du controlleur pour afficher la page d'inscription  
        }  
        else if($routeTab["route"] === "check-creer-un-compte") // condition pour l'action du formulaire d'inscription  
        {  
            $this->auth->checkRegister();// appeler la méthode du controlleur pour créer un utilisateur et renvoyer vers l'accueil  
        }  
        else if($routeTab["route"] === "connexion") // condition pour afficher la page du formulaire de connexion  
        {  
            $this->auth->login(); // appeler la méthode du controlleur pour afficher la page d'inscription  
        }  
        else if($routeTab["route"] === "check-connexion") // condition pour l'action du formulaire de connexion  
        {  
            $this->auth->checkLogin(); // appeler la méthode du controlleur pour vérifier la connexion et renvoyer vers l'accueil  
        }
        
        else if($routeTab["route"] === "creer-produit")
        {
            $this->ctrl->createProduct();
        }
        else if($routeTab['route'] === "check-creer-produit")
        {
            $this->ctrl->checkCreateProduct();
        }
        else if($routeTab['route'] === "creer-categorie")
        {
            $this->ctrl->createCategory();
        }
        else if($routeTab['route'] === "check-creer-categorie")
        {
            $this->ctrl->checkCreateCategory();
        }
        
    }
}
        