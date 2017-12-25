<?php include "classes.php" ?>
<?php



/**
 * Created by PhpStorm.
 * User: Rob
 * Date: 12/9/2017
 * Time: 1:17 AM
 */
if(SessionManager::getSecurityUserId() == 0){
    header("location: admin-login.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $returnVal = true;
    isset($_POST["itemname"]) && $_POST["itemname"] != "" ? $itemname = $_POST["itemname"] : $returnVal = false;
    isset($_POST["description"]) && $_POST["description"] != "" ? $description = $_POST["description"] : $returnVal = false;
    isset($_POST["imgurl"]) && $_POST["imgurl"] != "" ? $imgurl = $_POST["imgurl"] : $returnVal = false;
    isset($_POST["price"]) && $_POST["price"] != "" ? $price = $_POST["price"] : $returnVal = false;


    isset($_POST["itemtype"]) && $_POST["itemtype"] > 0 ? $itemtype = $_POST["itemtype"] : $returnVal = false;
    if($returnVal){
        $currentDate = date('Y-m-d H:i:s');
        $item = new Item(0, $itemname, $description, $imgurl, $price, $itemtype, $itemstatustype,$currentDate,null);
        $item->save();
        header("location: shop-item.php?id=".$item->getId());
    }
    else{
        $validationMsg = "Please review your entries!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

<body class="bg-light" id="page-top">
<?php include "navbar.php" ?>
<div class="container">
    <?php if(isset($validationMsg)) { ?>
        <div class="alert alert-danger alert-dismissible fade show mx-auto mt-5" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4> <?php  echo $validationMsg; ?> </h4>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card mx-auto mt-5">
                <div class="card-header">Create Item</div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input class="form-control" id="itemname" name="itemname" type="text" placeholder="Item Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" type="text" placeholder="Item Description"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="itemtype">Type</label>
                                    <select class="form-control" name="itemtype">
                                        <option value="0">--Select Type--</option>
                                        <?php
                                        $itemTypeList = Itemtype::loadall();
                                        if(!empty($itemTypeList)){
                                            foreach ($itemTypeList as $it) {
                                                ?>
                                                <option value="<?php echo $it->getId() ?>"><?php echo $it->getName() ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="statustype">Status</label>
                                    <select class="form-control" name="itemstatustype">
                                        <option value="0">--Select Status--</option>
                                        <?php
                                        $itemStatusTypeList = Itemstatustype::loadall();
                                        if(!empty($itemStatusTypeList)){
                                            foreach ($itemStatusTypeList as $ist) {
                                                ?>
                                                <option value="<?php echo $ist->getId() ?>"><?php echo $ist->getName() ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="imgurl">Image Url</label>
                                    <input class="form-control" id="imgurl" name="imgurl" type="text" placeholder="Image Url">
                                </div>
                                <div class="col-md-6">
                                    <label for="price">Price</label>
                                    <input class="form-control" id="price" name="price" type="text" placeholder="$ 0.00">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Create Item</button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="shop-home.php">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "scripts.php" ?>

</body>

</html>

