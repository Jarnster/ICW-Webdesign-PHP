<?php


function checkIfUserCan(int $user_id, $permission): bool
{

    // Database connection
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');

    // #1 - SQL query
    $sql = 'SELECT * FROM users WHERE id = ?';

    // Prepare the query
    $stmt = $pdo->prepare($sql);

    // Bind and execute
    $stmt->execute([$user_id]);

    $role_id = $stmt->fetch()["role_id"];

    // #2 - SQL query
    $sql = 'SELECT * FROM role_permissions WHERE id = ?';

    // Prepare the query
    $stmt = $pdo->prepare($sql);

    // Bind and execute
    $stmt->execute([$role_id]);

    return $stmt->fetch()[$permission] ?? false;

    
}
