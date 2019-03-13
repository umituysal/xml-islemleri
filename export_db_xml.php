<?php
$books=simplexml_load_file("books.xml");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xml";

try {
   $db=new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

} catch (PDOException $e) {
    echo $e->getMessage();
}
$books=$db->query("select * from books",PDO::FETCH_ASSOC)->fetchAll();
$xml=new SimpleXMLElement("<xml/>");
$catalog=$xml->addChild("catalog");
foreach ($books as $book) {
    $book_element=$catalog->addChild("book");
    $book_element->addAttribute("id",$book["book_code"]);

    $book_element->addChild("title",$book["title"]);
    $book_element->addChild("author",$book["author"]);
    $book_element->addChild("genre",$book["genre"]);
    $book_element->addChild("price",$book["price"]);
    $book_element->addChild("description",$book["description"]);
    $book_element->addChild("publish_date",$book["publish_date"]);

}
//Header('Content-type: text/xml');
//print($xml->asXml());
fopen("kitap_listesi.xml","w") or die("Dosya Oluşturulamadı!");
file_put_contents("kitap_listesi.xml",$xml->asXML());
