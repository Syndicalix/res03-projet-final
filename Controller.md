controllers.md
Le fichier controllers.md contiendrait des informations sur les différents contrôleurs (controllers) utilisés dans le site web pour interagir avec les données et gérer les différentes fonctionnalités.

* MenuController
Affiche la liste des différents plats turcs disponibles dans le menu
Permet de filtrer les plats par type (kebab, shawarma, falafel, etc.)
Permet de trier les plats par prix ou popularité
Gère l'ajout de plats au panier d'achat

* CartController
Affiche le contenu du panier d'achat
Permet de modifier la quantité de plats dans le panier
Permet de supprimer des plats du panier
Calcule le montant total de la commande

* OrderController
Gère la création de nouvelles commandes
Permet de choisir le mode de livraison (à emporter ou livraison)
Permet de saisir les informations de paiement (carte de crédit, PayPal, etc.)
Envoie un email de confirmation de la commande au client et à l'entreprise

* AccountController
Permet aux utilisateurs de se connecter ou de s'inscrire sur le site
Gère la validation des informations de connexion et de l'authentification des utilisateurs
Affiche le profil de l'utilisateur connecté
Permet de modifier les informations du profil