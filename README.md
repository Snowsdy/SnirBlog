# SnirBlog

---

## What is it ?

SnirBlog is a website made to a school work.

```php
echo 'To learn Php';
```

Enjoy :)

### Log des users :

---

#### Admin account

- Pseudo: **admin**
- Mdp: **admin**

#### User account

- Pseudo: **user**
- Mdp: **user**

---

### Connect.php

---

In the config folder, add connect.php, then add this code :

```php
<?php

$host = 'localhost';
$user = 'user';
$pass = 'password';
$db = 'dbName';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $bdd = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
```

### Schema_SQL

First, create a database named `blog`, then go to `import` and choose `blog.sql.zip` to import a little db.
