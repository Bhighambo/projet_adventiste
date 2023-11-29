<?php include "menuAdmin.php"; ?>
    <?php
            if (!empty($_POST["categorie"])) {
              $dossier="photos/";
                $categorie=htmlspecialchars($_POST['categorie']);
                $publication=htmlspecialchars($_POST['publication']);

                $photo=$_POST["categorie"].'_'.$_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"], $dossier.$photo);

                $requet=$bdd->prepare("INSERT INTO publication (datepub, categorie, designation, photo) values (NOW(),?,?,?)");
                $requet->execute([$categorie, $publication, $photo]);
                $message="Enregistrement effectué avec succès";
            }

               if (!empty($_POST["categorieMod"])) {
                $dossier="photos/";

                $categorie=htmlspecialchars($_POST["categorieMod"]);
                $publication=htmlspecialchars($_POST["publicationMod"]);
                $idpub=htmlspecialchars($_POST["idpub"]);

                $photo=$_POST["categorieMod"].'_'.$_FILES["photoMod"]["name"];
                move_uploaded_file($_FILES["photoMod"]["tmp_name"], $dossier.$photo);

                $requet=$bdd->prepare("UPDATE publication set categorie=?, designation=?, photo=? where idpub=?");
                $requet->execute([$categorie, $publication, $photo, $idpub]);
                $message="Modification effectuée avec succès";
            }
            if (!empty($_GET["supprimer"])) {
                $iddocteur=htmlspecialchars($_GET["supprimer"]);
                $requet=$bdd->prepare("DELETE from publication where idpub=?");
                $requet->execute([$iddocteur]);
                $message="Suppression effectuée avec succès";
            }

        ?>
  <main id="main">
    <div class="breadcrumbs" data-aos="fade-in" style="padding-top: 100px;">
      <div class="container">
        <h2>Enregistrement des catégories</h2>
      </div>
    </div>
    <section id="contact" class="contact">
        <div class="container row" data-aos="fade-up">
          <div class="col-lg-5">
          	<?php if (empty($_GET["modifier"])): ?>
          		<form action="categorie.php" method="post" role="form" class="" enctype="multipart/form-data">
            	<?php if (!empty($message)): ?>
            		<p class="alert alert-success"><?php echo $message; ?></p>
            	<?php endif ?>
               <?php if (!empty($_GET["confirmer"])): ?>
                <div class="alert alert-success">Voulez-vous vraiment supprimer ? <a href="categorie.php?supprimer=<?php echo $_GET["confirmer"]; ?>" class="btn btn-primary"><b>OUI</b></a> <a href="categorie.php" class="btn btn-primary">NON</a></div>
              <?php endif ?>

              <div class="form-group mt-3">
                <select class="form-control" name="categorie">
                	<option>Semons</option>
                	<option>A la-une</option>
                	<option>Ecole du sabbat</option>
                	<option>Laics</option>
                	<option>Livres</option>
                	<option>Education Chr</option>
                	<option>Ass. Pastorale</option>
                	<option>Mifem et Enfants</option>
                	<option>Economat</option>
                	<option>Min. Personnel</option>
                	<option>Communication</option>
                	<option>Mas</option>
                	<option>Développement</option>
                </select>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="publication" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control" name="photo" id="subject" placeholder="Nom de la catégorie">
              </div>
              <div class="text-center"><button type="submit" style="width: 40%; height: 40px; border-radius: 20px; margin-top: 20px; background-color: green; border: none; color: white;">Enregistrer</button></div>
            </form>
          	<?php endif ?>

          	<?php if (!empty($_GET["modifier"])): ?>
          		<form action="categorie.php" method="post" role="form" class="" enctype="multipart/form-data">
            	<?php if (!empty($message)): ?>
            		<p class="alert alert-success"><?php echo $message; ?></p>
            	<?php endif ?>
            	<?php 
            	$recupPub = $bdd->prepare("SELECT * FROM publication where idpub=?");
            	$recupPub->execute([$_GET["modifier"]]);
            	$valeur = $recupPub->fetch();

            	 ?>
              <div class="form-group mt-3">
                <select class="form-control" name="categorieMod">
                	<option>Semons</option>
                	<option>A la-une</option>
                	<option>Ecole du sabbat</option>
                	<option>Laics</option>
                	<option>Livres</option>
                	<option>Education Chr</option>
                	<option>Ass. Pastorale</option>
                	<option>Mifem & Enfants</option>
                	<option>Economat</option>
                	<option>Min. Personnel</option>
                	<option>Communication</option>
                	<option>Mas</option>
                	<option>Développement</option>
                </select>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="publicationMod" rows="5" placeholder="Message" required>
                	<?php echo $valeur->designation; ?>
                </textarea>
              </div>
              <div class="form-group mt-3">
                <input type="file" class="form-control" name="photoMod" id="subject" placeholder="Nom de la catégorie">
              </div>
              <input type="hidden" name="idpub" value="<?php echo $valeur->idpub; ?>">
              <div class="text-center"><button type="submit" style="width: 40%; height: 40px; border-radius: 20px; margin-top: 20px; background-color: green; border: none; color: white;">Modifier</button></div>
            </form>
          	<?php endif ?>
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0">
          	<div class="infos">
          		<table class="table">
          			<thead>
          				<tr>
          					<th>N°</th>
          					<th>Catégorie</th>
          					<th>Publication</th>
          					<th>Image</th>
          					<th class="text-center" colspan="2">Action</th>
          				</tr>
          			</thead>
          			<tbody>
          				<?php 
          				$recupPublication = $bdd->prepare("SELECT * from publication");
          				$recupPublication->execute();
          				$num = 0;
          				while ($donnees_infos = $recupPublication->fetch()) {
          					$num = $num + 1;
          					?>
          					<tr>
	          					<td><?php echo $num; ?></td>
	          					<td><?php echo $donnees_infos->categorie; ?></td>
	          					<td><?php echo $donnees_infos->designation; ?></td>
	          					<td><img src="photos/<?php echo $donnees_infos->photo; ?>" style="width: 150px; height: 150px;"></td>
	          					<td><a href="categorie.php?confirmer=<?php echo $donnees_infos->idpub; ?>" class="btn btn-danger">Supprimer</a></td>
	          					<td><a href="categorie.php?modifier=<?php echo $donnees_infos->idpub; ?>" class="btn btn-primary">Modifier</a></td>
          				    </tr>



          					<?php
          				}

          				 ?>
          			</tbody>
          		</table>
          	</div>
          </div>
      </div>
    </section>

  </main>

<?php include "footer.php"; ?>