<?php
if(login_check() >= 999){
    $target_dir = $PATH['UPLOADS'].$_POST['folder_path']."/";
    $query = "UPDATE lms_sw
                SET sw_logo = ''
                WHERE   sw_id = ".$_POST['software_id'];
    // echo $query;die();
    if ($mysqli->query($query)) {
        // Removes current file from directory
        if (array_key_exists('delete_file', $_POST)) {
            $filename = $target_dir.$_POST['delete_file'];
            if (file_exists($filename)) {
                unlink($filename);
            } 
        }
        /*Closes the current window*/
        header('Location: .?view=admin_sw_details&swid='.$_POST['software_id']);
    } else {
        $error = 'Unable to Update Database';
        header('Location: .?view=admin_sw_details&swid='.$_POST['software_id']."&submit_error=".urlencode($error));
    }
    
}
