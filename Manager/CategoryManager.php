<?php  
 
class CategoryManager extends AbstractManager {  
   
    public function getAllCategories() : array  
    {  
        $list = [];  
      
       $query = $this->db->prepare('SELECT * FROM categories'); // Pour accéder à la base de données utilisez $this->db  
       $query->execute();
       $categories = $query->fetchAll(PDO::FETCH_ASSOC);
       $categ = [];
       
       foreach($categories as $categorie)
       {
            $categ = new Category($categorie["name"], $categorie["slug"], $categorie["description"]);
            $categ->setId($categorie["id"]);
            $list[] = $categ;
       }
        return $list;  
    }  
      
    public function getCategoryBySlug(string $slug) : Category  
    {  
        $query = $this->db->prepare('SELECT * FROM categories WHERE categories.slug=:slug '); 
                                        // Pour accéder à la base de données utilisez $this->db  
        $parameter = ["slug" =>$slug];
        $query->execute($parameter);
        $categories = $query->fetch(PDO::FETCH_ASSOC);
        $categ = new Category($categories["name"], $categories["slug"], $categories["description"]);
        $categ->setId($categories["id"]);
        return $categ;
    }
    
    public function getCategoriesByProductSlug(string $slug) : array
    {
        $query = $this->db->prepare('SELECT categories.* FROM products_categories JOIN products ON products_categories.products_id = products.id JOIN 
                                        categories ON products_categories.category_id = categories.id WHERE products.slug =:slug '); 
                                        // Pour accéder à la base de données utilisez $this->db  
        $parameter = ["slug" =>$slug];
        $query->execute($parameter);
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        $list = [];
        foreach($categories as $categorie)
       {
            $categ = new Category($categorie["name"], $categorie["slug"], $categorie["description"]);
            $categ->setId($categorie["id"]);
            $list[] = $categ;
       }
        return $list;
    }
}