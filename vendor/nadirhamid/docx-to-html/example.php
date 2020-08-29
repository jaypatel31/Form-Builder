<?php
/**
 * Created by PhpStorm.
 * User: jasoncrider
 * Date: 1/24/17
 * Time: 4:53 PM
 */
require_once("vendor/autoload.php");

$doc = new \Docx_reader\Docx_reader();
$doc->setFile('./sample.docx');

if(!$doc->get_errors()) {
    $html = $doc->to_html();
    $plain_text = $doc->to_plain_text();

    file_put_contents("/var/www/html/testing.html", $html);
} else {
    echo implode(', ',$doc->get_errors());
}
echo "\n";
