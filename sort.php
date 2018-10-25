<?php

if (isset($_REQUEST['sort'])) {
    include('include/config.php');
    $id = $_REQUEST['sort'];
//    echo $id;
    if ($id == 1) {
        $orderBy = mysql_query('select * from `movies` WHERE `delete` = 0  order by `movie_length` ASC');
    } else if ($id == 2) {
        $orderBy = mysql_query('select * from `movies` WHERE `delete` = 0  order by `movie_release_date` ASC');
    }
    $html = '';
    while ($row = mysql_fetch_array($orderBy)) {
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
}
?>