<?php include "connexion.php"; ?>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
   
    if(isset($_POST['name'])){
        $name=htmlentities($_POST['name']);
        $email=htmlentities($_POST['email']);
        $subject="Perte du mot de passe";

        $recup = $bdd->prepare("SELECT * FROM admin WHERE nomutilisateur=?");
        $recup->execute([$name]);
        if ($ecole = $recup->fetch()) {
            $massage=$ecole->motdepasse;

            $mail= new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->SMTPAuth=true;
            $mail->Username='jacksonkennedy336@gmail.com';//L'adresse qui envoie le message
            $mail->Password='xoks kabx evow yxgr';//Mot de passe qui est generer pas google(securité->mots de passe d'application) Activer 
            $mail->Port=465;
            $mail->SMTPSecure='ssl';
            $mail->isHTML(true);
            $mail->setFrom($email, $name);
            $mail->addAddress($email);
            $mail->Subject= ("$subject");
            $mail->Body=$massage;
            $mail->send();

            header("location:motdepasse.php?message=1");
        }else{
           header("location:motdepasse.php?messages=1"); 
        }
        

    }

