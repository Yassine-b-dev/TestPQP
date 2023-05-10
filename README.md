
# Test PQP

J'ai développer le projet sous linux en sous-syteme de windows.

Le projet récupère une liste de film via une commande et les stock en bdd. les films sont affiché sur le site et peuvent être modifié ou supprimé par une personne qui a un compte.
il ya également une barre de recherche qui permet de retrouver un ou des films.

## Installation

Cloner le projet :
```bash
    git clone https://github.com/Yassine-b-dev/testPQP.git
    cd testPQP
```

Commande que je lance pour lancer le projet je fais :
```bash
    composer install
    npm install
    php artisan serve
    npm run dev
```


comme le projet à été dockeriser avec sail la commande :
```bash
    ./vendor/bin/sail up
```
lance bien le docker


commande pour récupérer les films de l'api:

```bash
    php artisan app:api-movie-db
```