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
foreach ($books->children() as $value ) {
        $prepare=$db->prepare("INSERT INTO books SET
        title= :title,
        author= :author,
        genre= :genre,
        publish_date= :publish_date,
        price= :price,
        description= :description,
        book_code= :book_code
        ");
    
        $insert=$prepare->execute(array(
            "title"=> $value->title,
            "author"=> $value->author,
            "genre"=> $value->genre,
            "publish_date"=>$value->publish_date,
            "price"=> $value->price,
            "description"=>$value->description,
            "book_code"=> $value["id"]
        ));
        if ($insert) {
            echo "eklenen kayıt : {$value["id"]} "."<br>";
        }
    }


?>