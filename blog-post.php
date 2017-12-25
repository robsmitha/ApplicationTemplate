<?php include "classes.php" ?>
<?php
$customerId = SessionManager::getCustomerId() == 0 ? null : SessionManager::getCustomerId();
$securityuserid = SessionManager::getSecurityUserId() == 0 ? null : SessionManager::getSecurityUserId();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $returnVal = true;
    if(isset($_POST["btnPostComment"])){
        isset($_POST["comment"]) && $_POST["comment"] != "" ? $comment = $_POST["comment"] : $returnVal = false;
        isset($_POST["hfBlogId"]) && $_POST["hfBlogId"] != "" ? $blogid = $_POST["hfBlogId"] : $returnVal = false;
        $currentDate = date('Y-m-d H:i:s');
        if($returnVal){
            $blogcomment = new Blogcomment(0,$comment,$securityuserid,1,$blogid,$currentDate, null);
            $blogcomment->save();
            header("location: blog-post.php?id=$blogid");
        }
    }
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $blog = new Blog($_GET["id"]);
        if($blog != null){

        }
        else{
            header("location: index.php");
        }
    }
    else{
        header("location: index.php");
    }
}


$blogCommentList = Blogcomment::loadbyblogid($blog->getId());
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

  <body>

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
          <?php echo $blog->getTitle() ?>
        <small>by
          <a href="#"><?php echo $blog->getSecurityUserId() ?></a>
        </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Blog Home 2</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $blog->getImgUrl() ?>" alt="">

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo $blog->getCreateDate() ?></p>

          <hr>

          <!-- Post Content -->
          <p>
              <?php echo nl2br($blog->getDescription()) ?>
          </p>

          <hr>
            <?php
            if($securityuserid != null && $securityuserid > 0){
            ?>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <textarea name="comment" class="form-control" rows="3" required></textarea>
                            </div>
                            <button name="btnPostComment" id="btnPostComment" type="submit" class="btn btn-primary">Submit</button>
                            <input type="hidden" name="hfBlogId" value="<?php echo $blog->getId() ?>">
                        </form>
                    </div>
                </div>
            <?php
            }
            if(!empty($blogCommentList)){
                foreach ($blogCommentList as $blogcomment){
                    $customer = new Customer($blogcomment->getCustomerId());
                    ?>
                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $customer->getFirstName()." ".$customer->getLastName() ?></h5>
                            <?php echo $blogcomment->getComment(); ?>
                        </div>
                    </div>
            <?php
                }
            }

            ?>


          <!-- Comment with nested comments
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div> -->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                  <?php
                  $blogCategoryLiat = Blogcategory::loadall();
                  if(!empty($blogCategoryLiat)){
                      foreach ($blogCategoryLiat as $bc) {
                          ?>
                  <div class="col-lg-6">
                      <a href="blog-home-1.php?id=<?php echo $bc->getId() ?>"><?php echo $bc->getName() ?></a>
                  </div>
                  <?php
                      }
                  }
                  ?>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
