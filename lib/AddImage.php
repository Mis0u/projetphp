<?php 

namespace Lib;

class AddImage{

    public function addImageArticle($fileName){
        if ($_FILES[$fileName] != NULL AND $_FILES[$fileName]['error'] == 0){
            if ($_FILES[$fileName]['size'] <= 1000000){
                $fileInfos = pathinfo($_FILES[$fileName]['name']);
                $extension_upload = $fileInfos['extension'];
                $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_allowed)){
                            move_uploaded_file($_FILES[$fileName]['tmp_name'], 'asset/upload/' . basename($_FILES[$fileName]['name']));
                    }
            }
        }
    }
}