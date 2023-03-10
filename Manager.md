managers.md
Le fichier managers.md contiendrait des informations sur les différents gestionnaires (managers) utilisés dans le site web pour gérer les données, les services et les fonctionnalités.

* MenuManager
Gère les données relatives au menu des plats turcs
Permet d'ajouter, de modifier et de supprimer des plats du menu
Gère les images et les descriptions de chaque plat
Calcule le prix de chaque plat en fonction des ingrédients utilisés

* CartManager
Gère les données relatives au panier d'achat
Stocke les plats ajoutés par l'utilisateur
Calcule le montant total de la commande
Permet de vider le panier

* OrderManager
Gère les données relatives aux commandes
Stocke les informations de chaque commande passée
Permet de suivre l'état de la commande (en attente, en cours de préparation, en cours de livraison, livrée)
Permet de mettre à jour l'état de la commande en temps réel

* UserManager
Gère les données relatives aux utilisateurs
Stocke les informations de chaque utilisateur

* RestaurantManager
Gère les données relatives au restaurant turc
Stocke les informations telles que l'adresse, le numéro de téléphone, les horaires d'ouverture, etc.
Permet de mettre à jour ces informations en temps réel

* PaymentManager
Gère les données relatives aux paiements
Stocke les informations de paiement de chaque commande
Calcule le montant total de la commande en fonction des plats choisis et des options de livraison

* IngredientManager
Gère les données relatives aux ingrédients utilisés dans les plats turcs
Stocke les informations telles que le nom, le prix, la quantité disponible, etc.
Permet de mettre à jour les informations des ingrédients en temps réel

Ces gestionnaires sont responsables de l'accès et de la manipulation des données dans la base de données, ainsi que de la communication avec les différents contrôleurs pour gérer les différentes fonctionnalités du site web.

Les gestionnaires peuvent être implémentés à l'aide de classes dans le langage de programmation utilisé pour construire le site web, et peuvent être instanciés et utilisés par les contrôleurs pour accéder aux données et fonctionnalités nécessaires.