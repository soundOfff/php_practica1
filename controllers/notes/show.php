<?php

use Core\classes\App;
use Core\classes\Database;

$db = App::resolve(Database::class);


$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->find();

authorize($note['userId'] === 5);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
