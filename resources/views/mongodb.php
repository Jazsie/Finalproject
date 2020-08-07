<?php

// Create Functions
use MongoDB\Operation\UpdateOne;

$collection = (new MongoDB\Client)->Project->Movies;

//Read Functions
$table = $collection->find();

// foreach ($table as $record) {
//     echo "<br />";
//     echo "ID: ".$record["_id"]."<br >";
//     echo "Category:".$record->category."<br />";
//     echo "Description:".$record["description"]."<br />";
// }

// //Delete  Functions
// $deleteResult = $collection->deleteOne([
//     "category" => "TV"
// ]);

// printf("Deleted %d document(s)<br />", $deleteResult->getDeletedCount());

//   $collection = (new MongoDB\Client)->Project->Movies;
//    //$id = "fd1708v9de2g78c01af509";
//    $product = $collection->findOne();
//    //$product = $collection->find();

//   var_dump($product);
//   print_r($product);