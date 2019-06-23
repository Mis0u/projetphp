<?php 

$title = "Contact" ;
$body = "about contact"  ;

ob_start() ; ?>
<h1>Contactez-moi</h1>
<form method ="post">
    <div class ="name">
        <label for="name"> Votre nom : *</label>
        <input name="name" id="name" type="texte">
    </div>
    <div class ="mail">
        <label for="mail"> Votre email : *</label>
        <input name = "mail" id = "mail" type ="mail">
    </div>
    <div class="message">
        <label for="message"> Votre message : *</label>
        <textarea name="message" rows="9" cols="50" id="message"> </textarea>
    </div>
</form>

<?php $content = ob_get_clean();

require "template.php" ;
?>