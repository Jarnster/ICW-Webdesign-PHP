<?php

function CheckIfUserCan(int $user_id, $permission): bool
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=garage', 'root', '');

    $sql = 'SELECT * FROM users WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    $role_id = $stmt->fetch()["role_id"];

    $sql = 'SELECT * FROM role_permissions WHERE role_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$role_id]);

    return $stmt->fetch()[$permission] ?? false;
}
