<?php

include('include/config.php');
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    if ($id == 0) {
        $filterBy = mysql_query("select * from `movies` where `delete`=0");
    } else {
        $_SESSION['lang_id'] = $id;
        $filterBy = mysql_query("SELECT * 
FROM  `movies` 
JOIN  `relationship` ON  `movies`.`id` =  `relationship`.`movie_id` 
WHERE  `relationship`.`category_id` ='$id' ");
    }
}
if (isset($_REQUEST['genre_id'])) {

    $genre_id = $_REQUEST['genre_id'];
//    echo $id;
    if ($genre_id == 0) {
        $filterBy = mysql_query("select * from `movies` where `delete`=0");
    } else {
        $_SESSION['genre_id'] = $genre_id;
        $filterBy = mysql_query("SELECT * 
FROM  `movies` 
JOIN  `relationship` ON  `movies`.`id` =  `relationship`.`movie_id` 
WHERE  `relationship`.`category_id` ='$genre_id' ");
    }
}

$html = '';
while ($row = mysql_fetch_array($filterBy)) {
    $name = $row['title'];
    $description = $row['description'];
    $featured_image = $row['featured_image'];
    $movie_length = $row['movie_length'];
    $movie_release_date = $row['movie_release_date'];

    $html .= "<tr>
    <td>" . $name . "</td>
    <td>" . $description . "</td>
    <td>" . $featured_image . "</td>
    <td>" . $movie_length . "</td>
    <td>" . $movie_release_date . "</td>

  </tr>";
}
echo $html;
?>