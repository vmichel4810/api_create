# API DW15

## Accès à l'API :

Faire les commandes : 
-     composer install
-     php artisan migrate:fresh --seed
-     php artisan serve


Liens :
- http://localhost:8000/api/drivers : pour accèder aux pilotes
- /api/circuits
- /api/constructors
- /api/races
- /api/results


## Fonctionnalitées :

- Pagination : Sur chaque pages 15 éléments sont visibles.
- Sort : Le sort ne fonctionne pas, le code est dans Drivercontroller.php.
- Search : sur circuitRef et name.
- Filter : 

### Bonus

 - http://127.0.0.1:8000/api/docs : permet d'afficher la documentation de swagger (les shows et les updates ne marchent pas)
 - Authentification : 