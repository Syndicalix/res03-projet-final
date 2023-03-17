<?php

require "managers/UserManager.php";
require "controllers/AbstractController.php";

class UserController extends AbstractController {
    
    private UserManager $manager;
    
    public function index()
    {
        $this->manager = new UserManager("sebastienspeich_soutienMVC", "3306", "db.3wa.io", "sebastienspeich", "78e591a8c7d3161b1f57097e0e688eba");
        
        $users = $this->manager->getAllUsers();
        
        $this->render("index", [
            
            "users" => $users
            
            ]);
    }
    
    public function create(array $post)
    {
        if(isset($_POST["formName"]) && $_POST["formName"] === "createUser")
        {
            $email = $_POST["email"] ;
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            $user = new User($email, $username, $password);
            $this->manager = new UserManager("sebastienspeich_soutienMVC", "3306", "db.3wa.io", "sebastienspeich", "78e591a8c7d3161b1f57097e0e688eba");
            $this->manager->insertUser($user);
            
            header("location:index.php?route=users");
        }
        $this->render("create", []);
    }
    
    public function edit(array $post)
    {
            $this->manager = new UserManager("sebastienspeich_soutienMVC", "3306", "db.3wa.io", "sebastienspeich", "78e591a8c7d3161b1f57097e0e688eba");
        
            if(isset($_POST["formName"]) && $_POST["formName"] === "editUser")
        {
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            $user = new User($email, $username, $password);
            $this->manager->editUser($user);
            
        }
        
/*        var_dump($userId);
        die;*/
        
        if (isset($_GET["userId"]))
        {
            $usr = $this->manager->getUserById(intval($_GET["userId"]));
            $this->render("edit", ["user" => $usr]);
        }
        else
        {
            header("location: index.php?route=users");
        }
    }

}
?>