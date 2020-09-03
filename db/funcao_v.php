<?php
function testaCampos($campos){
    foreach($campos as $fields):
        if(empty($fields)): 
            echo "<script type='text/javascript'>alert('Algum campo ficou vazio. Por favor volte e preencha todos')</script>";
            exit;
        endif;    
    endforeach;
}
?>