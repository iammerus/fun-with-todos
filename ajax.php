<?php

require_once __DIR__ . '/app/functions.php';


try {
    $input = json_decode(file_get_contents('php://input'));

    switch ($input->action) {
        case 'toggle-state':

            if ($input->status === 'incomplete') {
                mark_item_as_done($input->id);
            } else {
                mark_item_as_incomplete($input->id);
            }


            echo json_encode([
                'status' => 'success'
            ]);
            break;

        case 'add-todo':
            $id = add_item($input->text);


            echo json_encode([
                'status' => 'success',
                'id' => $id
            ]);
            break;
    }
} catch (Exception $e) {
    echo json_encode([
        'status' => 'failed',
        'error' => $e->getMessage()
    ]);
}