
```markdown
# Projet MVC PHP – Application Web avec Authentification et Rôles

## 1. Architecture

L’application est conçue selon le **modèle MVC (Model – View – Controller)** pour séparer clairement les responsabilités, facilitant la maintenance et l’évolution du projet.

```
## Architecture MVC

![Architecture MVC PHP](docs/architecture.png)

```bash
projet-mvc/
│
├── app/
│   ├── controllers/      # Logique des routes et actions (AuthController, AdminController, SiteController)
│   ├── models/           # Gestion des données et règles métier (User, LoginForm, DBModel)
│   ├── views/            # Templates front-end et back-end
│   │   ├── admin/        # Dashboard admin
│   │   ├── user/         # Dashboard utilisateur
│   │   ├── auth/         # Pages login/register
│   │   └── layouts/      # Layouts communs (header, footer, etc.)
│   ├── core/             # Classes fondamentales (Application, Router, Database, Controller, Request, Response, Session)
│   └── config/           # Configuration (routes, .env)
│
├── migrations/           # Scripts de migration DB
├── public/               # Point d’entrée et assets (CSS, JS, images)
│   └── index.php
├── .env                  # Variables d’environnement (DB)
├── composer.json         # Dépendances composer
└── README.md             # Documentation
````
````

**Explications :**
- **Controllers** → gèrent la logique métier et appellent les vues.  
- **Models** → représentent les données et leur manipulation (CRUD, validation).  
- **Views** → affichage HTML/CSS (Bootstrap 5), layouts séparés pour front et back.  
- **Core** → moteur de l’application (Router, Database, Application, etc.).  
- **Public** → tout ce qui est accessible depuis le navigateur.

---

## 2. Fonctionnement de l’application

### Routage
- `Router.php` gère les routes GET/POST vers les **controllers**.
- Exemple des routes principales :
```php
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/admin/dashboard', [AdminController::class, 'dashboard']);
$app->router->get('/home', [SiteController::class, 'home']);
````

### Authentification et rôles

* **Front-office** → Utilisateur classique (`User`) : `/home`.
* **Back-office** → Admin (`Admin`) : `/admin/dashboard`.
* **Redirection automatique selon rôle** après login.
* **Logout** → déconnexion et destruction de session.

### Vues

* Layouts distincts pour `auth`, `main` (front/back).
* Alertes messages success/error via session.
* Bootstrap 5 utilisé pour le design responsive.

### Base de données

* Connexion via **PDO** sécurisée.
* Tables principales : `users` et `migrations`.
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

* **PHP 8+** avec POO et namespaces.
* **MVC from scratch** sans framework externe.
* **Composer** pour autoloading.
* **Bootstrap 5** pour le front-end.
* **Dotenv** pour configuration sécurisée `.env`.
* **Sécurité** :

    * Requêtes préparées PDO
    * Gestion des sessions
    * Restriction des routes selon rôle

---

## 4. Planification (JIRA / Trello / Notion)

* Organiser les tâches : To Do, In Progress, Done.
* Stories possibles :

    * Authentification (Login/Register/Logout)
    * Dashboard Admin
    * CRUD Users
    * Routage et vues front-office
* Exemple d’outil : [Lien vers planification Jira](https://ucd-team-ktd9np56.atlassian.net/jira/software/projects/DDAWMAPOO/boards/70)

---

## 5. Lancer le projet en local

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

4. Accéder à l’application :

* Front-office → [http://localhost:8080/home](http://localhost:8080/home)
* Login/Register → [http://localhost:8080/login](http://localhost:8080/login)
* Admin dashboard → [http://localhost:8080/admin/dashboard](http://localhost:8080/admin/dashboard)

```


```
