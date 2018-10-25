<?php
include ('include/config.php');
$start = 0;
if (isset($_REQUEST['start'])) {
    $start = $_REQUEST['start'];
}
if (!($start > 0)) {
    $start = 0;
}


$eu = ($start - 0);
$limit = 10; // No of records to be shown per page.
$this_ = $eu + $limit;
$back = $eu - $limit;
$next = $eu + $limit;
$query2 = "SELECT * FROM `movies` WHERE `delete` = 0 ";
$result2 = mysql_query($query2);
echo mysql_error();
$nume = mysql_num_rows($result2);
?>
<?php require_once('include/header.php'); ?>

<div class="container">

    <div class="row">
        <h3 class="header smaller lighter blue">Movie Listing</h3>
        <div class="row">
            <form>
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Sort By: </label>
                    <div class="col-sm-3">
                        <select name="selSort" id="selSort" class="col-xs-10 col-sm-5">
                            <option value="0">Select</option>
                            <option value="1">Length</option>
                            <option value="2">Release Date</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <!--                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">  Filter By: </label>-->
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">  language: </label>
                    <div class="col-sm-3">
                        <select name="selLanguage" id="selLanguage" class="col-xs-10 col-sm-5">
                            <option value="0">All</option>
                            <?php
                            $cdquery = "SELECT * FROM `category` where `type`='language' and `delete`=0";
                            $cdresult = mysql_query($cdquery)or die(mysql_error());
                            while ($cdrow = mysql_fetch_array($cdresult)) {
                                $id = $cdrow["id"];
                                $value = $cdrow["value"];
                                echo "<option value='$id'>$value</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">  Genre: </label>
                    <div class="col-sm-3">
                        <select name="selGenre" id="selGenre" class="col-xs-10 col-sm-5">
                            <option value="0">All</option>
                            <?php
                            $genre = "SELECT * FROM `category` where `type`='genre' and `delete`=0";
                            $genre_result = mysql_query($genre)or die(mysql_error());
                            while ($result_row = mysql_fetch_array($genre_result)) {
                                $cat_id = $result_row["id"];
                                $cat_value = $result_row["value"];
                                echo "<option value='$cat_id'>$cat_value</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <br>
    <table   align="center" class="table table-responsive table-striped table-bordered table-hover" >
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Featured Image</th>
                <th>Movie Length</th>
                <th>Movie Release Date</th>
            </tr>
        </thead>
        <tbody id="table">
            <?php
            $i = 0;
//            include ('include/config.php');
            $squer = mysql_query("SELECT * FROM `movies` WHERE `delete`=0   ORDER BY id  limit $eu, $limit");
            $rows = mysql_num_rows($squer);
            while ($i < $rows) {
                //$status = ($result['status'] == 1)?'Active':'Inactive';
                ?>
                <tr >
                    <td><?php echo mysql_result($squer, $i, "title"); ?></td>
                    <td><?php echo mysql_result($squer, $i, "description"); ?></td>
                    <td><img src="asset/images/<?php echo mysql_result($squer, $i, "featured_image"); ?>" width="50"  height="50"/></td>
                    <td><?php echo mysql_result($squer, $i, "movie_length"); ?></td>
                    <td><?php echo mysql_result($squer, $i, "movie_release_date"); ?></td>


                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>

    <?php if ($i > 0) { ?>
        <table border="0" cellpadding="0" cellspacing="0" id="paging-table">
            <tr>
                <td>
                    <?php
                    $page_name = "index.php";
                    $pglist_nos = "";
                    $i = 0;
                    $l = 1;
                    for ($i = 0; $i < $nume; $i = $i + $limit) {
                        if ($i <> $eu) {
                            $pglist_nos.=" <li><a href='$page_name?start=$i'>$l</a></li> ";
                        } else {
                            if ($i > 0) {
                                $prevpg_link = "$page_name?start=" . ($i - $limit);
                            } else {
                                $prevpg_link = "";
                            }
                            if ($nume - 1 > $i) {
                                $nextpg_link = "$page_name?start=" . ($i + $limit);
                            } else {
                                $nextpg_link = "";
                            }
                            $pglist_nos.="<li><a href='#' class='current_page'><span><span>$l</span></span></a></li>";
                            $cur_page = $l;
                        }
                        $l = $l + 1;
                    }
                    ?>

                    <!--<a href="" style="display:none;" class="page-far-left"></a>-->

                    <?php if ($prevpg_link != "") { ?><a href="<?php echo $prevpg_link; ?>" style="display: block;
                           float: left;"><img src="asset/images/arrow-stop-180.gif" /></a><?php } else { ?>
                        <a href="#" style="display:none;" class="page-far-right"></a>
                    <?php } ?>

                    <div id="page-info" style='position: relative;
                         margin-left: 25px;
                         '>Page <strong><?php echo $cur_page; ?></strong> / <?php echo ($l - 1); ?></div>

                    <?php if ($nextpg_link != "" || $nextpg_link != NULL) { ?><a href="<?php echo $nextpg_link; ?>" style="    display: block;
                           float: right;
                           position: relative;
                           top: -20px;
                           left: 25px;"><img src="asset/images/arrow-stop.gif" /></a><?php } else { ?>
                        <a href="#" style="display:none;" class="page-far-right"></a>
                    <?php } ?>
                    </div>


                </td>
            </tr>
        </table>
    <?php } ?>
</div>




</body>
<?php require_once('include/footer.php'); ?>