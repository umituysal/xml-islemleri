<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
         *{
         font-family: sans-serif;
         margin-top:10px;
        }
        body{
            background-color: #fafafa;
            
        }
        .books{
        padding:0px;
        list-style-type:none;
        width:500px;
        margin: 0px auto;
        }
        .books li{
            padding:10px;
            background-color:#fff;
            cursor:default;
            border-left:2px solid #fbbd08;
            border-right:2px solid #fbbd08;
            margin-bottom:20px;
            border-radius:5px;
            box-shadow:0 0 8px rgba(0,0,0,.1);

        }
        .books li:hover>div{
            color:#fbbd08;
        }
        .books li div{
            text-align:center;
        }
    </style>

</head>
<body>
<ul class="books">
    <?php $xml=simplexml_load_file("books.xml"); ?>
<?php foreach($xml->children() as $key => $children) { ?>

<li>

<div>
<strong><?php print((string)$children->title) . "($children->publish_date)"; echo "<br>";?></strong>
</div>
<p><strong> Yazar: </strong> <?php echo $children->author;?></p>
<p><strong> Türü: </strong> <?php echo $children->genre;?></p>
<p><strong> Fiyatı: </strong> <?php echo $children->price;?></p>
<p><strong> Açıklama: </strong> <?php echo $children->description;?></p>


</li>
<?php } ?>
</ul>


</body>
</html>
