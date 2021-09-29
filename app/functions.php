<?php

$db = new mysqli('localhost', 'root', 'password', 'todo');


function get_items()
{
    global $db;

    $result = $db->query(
        "SELECT * FROM items ORDER BY created_at DESC;"
    );

    return $result->fetch_all();
}

function add_item($text)
{
    global $db;

    $db->query(
        "INSERT INTO `todo`.`items` (`text`) VALUES ('" . $text . "');"
    );

    return $db->insert_id;
}


function mark_item_as_done($id)
{
    global $db;

    $db->query(
        "UPDATE items SET status = 'complete' WHERE id = {$id}"
    );
}

function mark_item_as_incomplete($id)
{
    global $db;

    $db->query(
        "UPDATE items SET status = 'incomplete' WHERE id = {$id}"
    );
}
