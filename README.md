```markdown
# Projet MVC PHP – Application Web avec Authentification et Rôles

## 1. Architecture

L’application est conçue selon le **modèle MVC (Model – View – Controller)** pour séparer clairement les responsabilités :

```
projet-mvc/
│
├── app/
│ ├── controllers/ # Application controllers (AuthController, AdminController, SiteController)
│ ├── models/ # Data models (User, LoginForm, BaseModel, DBModel)
│ ├── views/ # Views for front-end and back-end
│ │ ├── admin/ # Admin dashboard views
│ │ ├── user/ # User dashboard views
│ │ ├── auth/ # Login/Register pages
│ │ └── layouts/ # Layout templates
│ ├── core/ # Core classes (Application, Router, Database, Controller, Request, Response, Session)
│ └── config/ # Configuration and routes (optional)
│
├── migrations/ # Database migration scripts
├── public/ # Public folder with index.php and assets
├── .env # Environment variables for DB connection
├── composer.json # Composer dependencies
└── README.md # Project documentation

markdown
Copier le code

---

## Fonctionnement de l’application

1. **Routing**
    - `Router.php` maps URLs to controller actions.
    - Front-end URLs (`/home`, `/login`) and back-end (`/admin/dashboard`) are separated.

2. **Authentication**
    - Users login via `/login`.
    - The system checks roles:
        - Admin → `/admin/dashboard`
        - User → `/home`
    - Logout clears session data.

3. **Models**
    - `User` model manages user data.
    - `DBModel` is the base class for database operations.

4. **Views**
    - Layouts in `/views/layouts/` handle headers, footers, and main template.
    - Dynamic content rendered using `{{content}}` placeholder.

5. **Database**
    - PDO connection configured via `.env`.
    - Migrations manage tables creation.

---

## 2. Fonctionnement de l’application

### Utilisateurs et Rôles

- **Front-office** : Utilisateurs classiques (`User`) peuvent accéder à leur tableau de bord `/home`.  
- **Back-office** : Administrateurs (`Admin`) accèdent au tableau de bord `/admin/dashboard`.  
- **Authentification** : Login / Register / Logout avec gestion des sessions.  
- **Redirection selon rôle** :  
    - Admin → `/admin/dashboard`  
    - User → `/home`  

### Routage

- `Router.php` gère les routes GET/POST vers les **controllers**.  
- Le contrôleur ne contient **aucun HTML**, il appelle les vues pour l’affichage.  
- Exemple de routes principales :
```php
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$app->router->get('/home', [SiteController::class, 'home']);
````

### Vues

* Les vues utilisent **Bootstrap 5** pour un design simple et responsive.
* Layouts distincts : `auth` pour login/register, `main` pour front-office et back-office.
* Alertes de session pour success/error messages.

### Base de données

* Connexion via **PDO** sécurisée avec requêtes préparées.
* Tables principales : `users`, `migrations` pour gérer l’historique des migrations.
* Exemple table `users` :

```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    role TINYINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
```

---

## 3. Choix techniques

* **PHP 8+** avec **POO** et **namespaces**.
* **Architecture MVC from scratch** sans framework externe.
* **Composer** pour l’autoloading.
* **Bootstrap 5** pour le front-end.
* **Dotenv** pour la configuration `.env` (base de données, etc.).
* **Sécurité** :

    * Requêtes préparées PDO
    * Gestion des sessions et logout
    * Restriction des routes selon rôle

---

## 4. Planification (JIRA / Trello / Notion)
- Mon projet GitHub : [Lien vers la planification ](https://ucd-team-ktd9np56.atlassian.net/jira/software/projects/DDAWMAPOO/boards/70)

---

## 5. Comment lancer le projet en local

1. Cloner le repo :

```bash
git clone https://github.com/n1o2h/projet-mvc.git
cd projet-mvc
composer install
```

2. Configurer `.env` :

```
DB_DSN="mysql:host=localhost;dbname=your_db_name"
DB_USER="root"
DB_PASSWORD=""
```


3. Lancer le serveur PHP :

```bash
php -S localhost:8080 -t public/
```

4. Accéder à :

* Front-office → `http://localhost:8080/home`
* Login/Register → `http://localhost:8080/login`

---
