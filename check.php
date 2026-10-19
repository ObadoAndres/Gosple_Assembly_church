<?php
$db = new PDO("sqlite:database/database.sqlite");
$stmt = $db->query("SELECT email,is_admin FROM users");
while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $r["email"] . ":" . $r["is_admin"] . PHP_EOL;
}

