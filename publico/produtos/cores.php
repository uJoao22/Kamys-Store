<?php
function color_format($cor) {
        $cor = strtolower($cor);
        switch($cor){
            case "vinho":
                return "#8A1335";
            break;
            case "amarelo":
                return "yellow";
            break;
            case "rosa":
                return "plum";
            break;
            case "vermelho":
                return "red";
            break;
            case "laranja":
                return "orange";
            break;
            case "preto e branco":
                return "linear-gradient(to right, black, white, black, white, black, white, black, white)";
            break;
            case "preto":
                return "black";
            break;
            case "verde":
                return "green";
            break;
            case "azul":
                return "royalblue";
            break;
            case "branco":
                return "white";
            break;
            case "cinza":
                return "gray";
            break;
            case "rosa e preto":
                return "linear-gradient(to right, plum, black, plum, black, plum, black, plum, black)";
            break;
        }
    }

?>