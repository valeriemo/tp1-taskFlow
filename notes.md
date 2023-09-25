## CRUD ##
- On peux afficher tous les projets (project/index)
- On peux se connecter
- On peux peux créer un nouvel utilisateur
- On peux créer un nouveau projet
- On peux editer/update un projet
- On peux créer des nouveaux tasks
- On peux deleter des tasks
- On peux afficher tous les task réliés à un projets seulement lorsqu'ils existent plus que 1 (probleme de condition ? je sais pas encore comment regler ca)
- chaque table à son model
- Twig est utiliser dans les controllers pour render les view

## Problèmes ##
- L'app n'est pas fonctionnelle encore.

- On peux update/edit un projet mais nous sommes rediriger vers la page home. Ca devient compliquer sans les variables de connexion. On peux aussi créer de nouveaux task mais je redirige vers la page home puisque je ne sais pas comment conserver autant de variables de l'utilisateur connecter.

- Je voudrais que l'utilisateur soit toujours rediriger vers la page user-index lorsqu'il est connecté mais je trouve cela complexe de toujours garder le id. 

- J'ai un problème avec la syntaxe de condition de Twig. Je ne comprends pas comment bien l'utiliser alors j'arrive pas a faire des boucle seulement lorsque ma variable est plus grande que 1. Dans mon site, les tasks ne s'affichent pas lorsqu'il n'existe qu'un seul task.

- Je voudrais pouvoir effacer les task en retournant l'action sur la même page. Je ne sais pas comment faire avec composer. Tout ce que je connais ne fonctionne pas...

## notes ##
User-index est la page principale (après la connexion)

