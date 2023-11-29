<?php include "menu.php"; ?>
<div class="breadcrumbs" data-aos="fade-in" style="padding-top: 70px;">
      <div class="container">
        <h2>Les livres</h2>
      </div>
    </div>
<section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
        	<?php 

        	$recup = $bdd->prepare("SELECT * FROM publication where categorie='Livres'");
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
                <td><embed src="https://drive.google.com/viewerng/viewer?embedded=true&url=http://projet_adventiste.uaclab.net/photos/<?php echo $donnees->photo; ?>" width="100px" height="100px"></td>
                <td><a href="fichiers/<?php echo $donnees->photo; ?>" download="<?php echo $donnees->photo; ?>" style="text-decoration:none;" class="btn btn-success">Télécharger</a></td>
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