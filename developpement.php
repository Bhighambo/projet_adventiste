<?php include "menu.php"; ?>
<div class="breadcrumbs" data-aos="fade-in" style="padding-top: 70px;">
      <div class="container">
        <h2>Développement</h2>
      </div>
    </div>
<section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
        	<?php 

        	$recup = $bdd->prepare("SELECT * FROM publication where categorie='Développement'");
        	$recup->execute();
        	while ($donnees = $recup->fetch()) {
        		?>
        		<div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="photos/<?php echo $donnees->photo; ?>" class="img-fluid" alt="">
              <div class="member-content">
                <h4><?php echo $donnees->categorie; ?></h4>
                <p>
                  <?php echo $donnees->designation; ?>
                </p>
              </div>
            </div>
          </div>
        		<?php
        	}

        	 ?>

        </div>

      </div>
    </section>
    <?php include "footer.php"; ?>