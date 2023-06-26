# Symfony Rest 
Première API REST en symfony

## How To Use
1. cloner le projet
2. `composer install`
3. Créer et importer la base de données
4. `symfony server:start`

## Exercices

### Premier contrôleur Rest
1. Créer un contrôleur MovieController et lui rajouter un constructeur contenant un MovieRepository en private	
2. Rajouter une route /api/movie, préciser dans la route que sa méthode est GET	
3. Faire un return d'un $this->json() avec le findAll du repository à l'intérieur
4. Tester cette méthode sur thunder client (ou autre client rest) en faisant une requête GET vers localhost:8000/api/movie
5. Rajouter une nouvelle route sur /api/movie/{id} en GET également, et dedans faire un findById, si le retour est null on fait un return d'un $this->json avec un message Resource Not Found et le status 404  , sinon on renvoie le movie
6. Rajouter une nouvelle route /api/movie/{id} mais cette fois ci en method DELETE et dedans on supprime le movie