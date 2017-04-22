<?php 


function TratamentoAmigavel($texto){
    $de = array('Á','Í','Ó','Ú','É','Ä','Ï','Ö','Ü','Ë','À','Ì','Ò','Ù','È','Ã','Õ','Â','Î','Ô','Û','Ê','á','í','ó','ú','é','ä','ï','ö','ü','ë','à','ì','ò','ù','è','ã','õ','â','î','ô','û','ê','Ç','ç');
    $para = array('A','I','O','U','E','A','I','O','U','E','A','I','O','U','E','A','O','A','I','O','U','E','a','i','o','u','e','a','i','o','u','e','a','i','o','u','e','a','o','a','i','o','u','e','C','c');

    $texto = preg_replace("[^a-zA-Z0-9_]", "", str_replace($de,$para,$texto));
    $texto = strip_tags(trim($texto));
    $texto = str_replace(array("     ","    ","    ","  "," "), "-",$texto);
    $texto = str_replace(array("-----","----","----","--"), "-",$texto);

    return strtolower(utf8_encode($texto));
}
function data($data,$formato=24){
    date_default_timezone_set('America/Sao_Paulo');
    $date=date_create($data,timezone_open("Etc/GMT0"));
    date_timezone_set($date,timezone_open("America/Sao_Paulo"));
    $data = date_format($date,"Y-m-d H:i:s");


    $hora = $formato == 12 ? "h" : "H";
    $am_pm = (date("H",strtotime($data)) < 12) ? " AM" : " PM";
    $am_pm = $formato == 24 ? "" : $am_pm;
    if(date('d/m/Y', strtotime($data)) == date('d/m/Y')){
        return "Hoje às ".date("$hora:i",strtotime($data)).$am_pm;
    }
    else if(date('m/Y', strtotime($data)) == date('m/Y') && date("d", strtotime($data)) == date("d")-1){
        return "Ontem às ".date("$hora:i",strtotime($data)).$am_pm;
    }
    else if(date('m/Y', strtotime($data)) == date('m/Y') && date("d", strtotime($data)) == date("d")+1){
        return "Amanha às ".date("$hora:i",strtotime($data)).$am_pm;
    }
    else{ 
        return date("d/m/Y",strtotime($data));
    }

}

// ------------------------------GUIA---------------------------------- //
//                Cria o hash da senha, usando MD5 e SHA-1              //
// -------------------------------------------------------------------- //
function make_hash($str){
    return sha1(md5($str));
}


// ------------------------------GUIA---------------------------------- //
//                    Verifica se o usuário está logado                 //
// -------------------------------------------------------------------- //
function isLoggedIn(){
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
        return false;
    }

    return true;
}

// ------------------------------GUIA---------------------------------- //
//             Verifica se o usuário tem nivel para acessar             //
// -------------------------------------------------------------------- //
function isPossible(){
    if (isset($_SESSION['user_nivel']) and $_SESSION['user_nivel'] == 1){
        return true;
    }

    return false;
}


?>