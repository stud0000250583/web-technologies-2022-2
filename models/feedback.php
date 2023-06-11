<?php
if (!empty($_GET['action'])) {
    doFeedbackAction($_GET['action']);
}

function getAllFeedback($id)
{
    $sql = "SELECT * FROM feedback WHERE feedback_item = $id";
    return getAssocResult($sql);
}

function create_feedback()
{
    if (isset($_POST)) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $message = $_POST['message'];
        $sql = "INSERT INTO feedback (name, contents, feedback_item) VALUES ('$name', '$message', $id)";
        executeSql($sql);
        header("Location: /catalog/$id");
    }
}

function update_feedback()
{
    if (isset($_POST)) {
        $catalog_id = $_POST['catalog_id'];
        $post_id = $_POST['id'];
        $contents = $_POST['message'];
        $sql = "UPDATE feedback SET contents = '$contents' WHERE id=$post_id";
        executeSql($sql);
        header("Location: /catalog/$catalog_id");
    }
}

function delete_feedback()
{
    if (isset($_POST)) {
        $catalog_id = $_POST['catalog_id'];
        $post_id = $_POST['id'];
        $sql = "DELETE FROM feedback WHERE id=$post_id";
        executeSql($sql);
        header("Location: /catalog/$catalog_id");
    }
}

function doFeedbackAction($action)
{
    switch ($action) {
        case ('create'):
            create_feedback();
            break;
        case ('update'):
            update_feedback();
            break;
        case ('delete'):
            delete_feedback();
            break;
        default:
            echo '404';
            die();
    }
}