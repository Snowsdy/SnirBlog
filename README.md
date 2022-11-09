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

- Pseudo: **Snowsdy**
- Mdp: **Snowsdy**

- Pseudo: **darkdevs**
- Mdp: **Evan**

- Pseudo: **Ed**
- Mdp: **Edward**

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
