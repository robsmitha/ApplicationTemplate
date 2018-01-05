<?php include "classes.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php" ?>

  <body>

    <!-- Navigation -->
    <?php include "navbar.php" ?>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/slide-1.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slide-2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/slide-3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Welcome to Application Template</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><i class="icon-speedometer"></i> Fast Setup</h4>
            <div class="card-body">
              <p class="card-text">Download the latest source from GitHub. Run project out of software like phpMyAdmin and in your MySQL server run the following command to build out the database schema.</p>
                <code class="small">
                    source /path/SQL/ApplicationTemplate.sql
                </code>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Download on GitHub</a>
            </div>
          </div>
        </div>
          <div class="col-lg-4 mb-4">
              <div class="card h-100">
                  <h4 class="card-header"><i class="icon-key"></i> Key Functionality</h4>
                  <div class="card-body">
                      <p class="card-text">This template generated DAL files for Searching, Creating, Reading, Updating and Deleting database record. Each included table will have the corresponding generated SCRUD sprocs and DAL class.</p>
                  </div>
                  <div class="card-footer">
                      <a href="#" class="btn btn-primary">View Documentation</a>
                  </div>
              </div>
          </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><i class="icon-graph"></i> Definitely Scales</h4>
            <div class="card-body">
              <p class="card-text">This template was built to scale and has tons of potential! See where we've implemented some of these templates below.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">See Our Projects</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
        <br>
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Application Template Features</h2>
          <p>The Modern Business template by Start Bootstrap includes:</p>
          <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- Bootstrap core JavaScript -->
    <?php include "scripts.php" ?>

  </body>

</html>
