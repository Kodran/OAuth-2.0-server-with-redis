<?php
function jsonResponse($status, $result){
    return json_encode(array('status' => $status, 'response' => $result));
}
?>