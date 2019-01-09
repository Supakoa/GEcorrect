<?php 
// require composer autoload
require __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

// $url = urldecode($_REQUEST['url']);

$url = 'https?://www\.mydomain\.com';
// To prevent anyone else using your script to create their PDF files
if (!preg_match('@^https?://www\.mydomain\.com/@', $url)) {
    die("Access denied");
}

// For $_POST i.e. forms with fields
if (count($_POST) > 0) {

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1 );

    foreach($_POST as $name => $post) {
      $formvars = array($name => $post . " \n");
    }

    curl_setopt($ch, CURLOPT_POSTFIELDS, $formvars);
    $html = curl_exec($ch);
    curl_close($ch);

} elseif (ini_get('allow_url_fopen')) {
    $html = file_get_contents($url);

} else {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
    $html = curl_exec($ch);
    curl_close($ch);
}


$mpdf_link = '
<script language="javascript" type="text/javascript">
    /* <![CDATA[ */
    document.write(\'<form method="POST" action="makepdf.php?url=\' + encodeURIComponent(location.href) +\'">\');';

foreach ($_POST as $name => $post) {
    $mpdf_link .= 'document.write(\'<input type="hidden" name="' . $name . '" value="' . $post . '" />\'); '."\n";
}

$mpdf_link .= '
    document.write(\'<input type="submit" name="submit" value="Create PDF file of this page" />\');
    document.write(\'</form>\');
/* ]]> */
</script>';

echo $mpdf_link;

$mpdf = new \Mpdf\Mpdf();

$mpdf->useSubstitutions = true; // optional - just as an example
$mpdf->SetHeader($url . "\n\n" . 'Page {PAGENO}');  // optional - just as an example
$mpdf->CSSselectMedia='mpdf'; // assuming you used this in the document header
$mpdf->setBasePath($url);
$mpdf->WriteHTML($html);

$mpdf->Output();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="mypdf.css" type="text/css" rel="stylesheet" media="mpdf" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<style>
    #myheader, #mysearchbar, #myleftcol, #myfooter {
        display: none;
        }
        span.abstract_link {
        display: none;
        }
        #maincontents {
            float:none;
            margin:0px;
            overflow:auto;
            padding:0;
            width:100%;
        }
</style>
<script language="javascript" type="text/javascript">
  /* <![CDATA[ */
    document.write('<a href="makepdf.php?url=' + encodeURIComponent(location.href) +'">');
    document.write('Create PDF file of this page');
    document.write('</a>');
  /* ]]> */
</script>
<body>
    
</body>
</html>