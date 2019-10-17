<?php 

namespace Lib;

class Upload{

    public function addImage($fileName){
        if ($_FILES[$fileName] != NULL AND $_FILES[$fileName]['error'] == 0){
            if ($_FILES[$fileName]['size'] <= 1048576){
                $fileInfos = pathinfo($_FILES[$fileName]['name']);
                $extensionUpload = $fileInfos['extension'];
                $extensionsAllowed = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extensionUpload, $extensionsAllowed)){
                    move_uploaded_file($_FILES[$fileName]['tmp_name'], 'asset/upload/' . basename($_FILES[$fileName]['name']));
                    return 'asset/upload/' . basename($_FILES[$fileName]['name']);
                }
            }
        }
    }
}