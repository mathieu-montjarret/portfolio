<?php

$objetPdo = new PDO('mysql:host=localhost;dbname=portfolio', 'root', 'root');

if ($_POST) {

    if (empty($_POST['firstname']) || !preg_match('#^[a-zA-Z0-9._-]{2,49}+$#', $_POST['firstname'])) {

        $errorFirstname = "Merci d'entrer un prénom valide";

        $error = true;
    }

    if (empty($_POST['lastname']) || !preg_match('#^[a-zA-Z0-9._-]{2,49}+$#', $_POST['firstname'])) {

        $errorLastname = "Merci d'entrer un nom valide";

        $error = true;
    }

    if (empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

        $errorEmail = "Merci d'entrer un email valide";

        $error = true;
    }

    if (empty($_POST['subject']) || !preg_match('#^[a-zA-Z0-9._-]{2,49}+$#', $_POST['firstname'])) {

        $errorSubject = "Merci d'entrer un sujet valide";

        $error = true;
    }

    if (empty($_POST['message']) || !preg_match('#^[a-zA-Z0-9._-]{2,249}+$#', $_POST['firstname'])) {

        $errorMessage = "Merci d'entrer un message valide";

        $error = true;
    }

    if (!isset($error)) {

        $valid = "Merci de me porter de l'intérêt, je vous contacte dans les plus brefs délais";


        $to = "mathieu.montjarret@icloud.com";
        $from = $_POST['email'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $subject = $_POST['subject'];
        $message = $first_name . " " . $last_name . " a écrit le message suivant:" . "\n\n" . $_POST['message'];
        $headers = "From:" . $from;
        mail($to, $subject, $message, $headers);



        $pdoStat = $objetPdo->prepare('INSERT INTO contact VALUES (NULL, :firstname, :lastname, :email, :subject, :message)');

        $pdoStat->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $pdoStat->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $pdoStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $pdoStat->bindValue(':subject', $_POST['subject'], PDO::PARAM_STR);
        $pdoStat->bindValue(':message', $_POST['message'], PDO::PARAM_STR);

        $pdoStat->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Voici mon Portfolio de développeur web et applications.">
    <meta name="author" content="Montjarret Mathieu">
    <title>Mathieu Montjarret</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/me-circle.png" />
    <link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/layout.css">
</head>

<body id="body">
    <header>
        <i id='open' class="fas fa-bars fa-lg open"></i>
        <i id='close' class="fas fa-times fa-lg close"></i>
        <nav class="nav-part">
            <ul class="nav-list">
                <li><a href="#about">A propos</a></li>
                <hr>
                <li><a href="#projects">Projets</a></li>
                <hr>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div id="nightMode" class="moon">
            <i class="far fa-moon fa-lg empty-moon"></i>
            <i class="fas fa-moon fa-lg full-moon"></i>
        </div>

    </header>

    <main>
        <section id="about" class="about">
            <h2 class="from-top">Mathieu Montjarret</h2>

            <div class="myself">
                <img class="myself-picture" src="assets/img/me.jpg" alt="portrait-me">
                <div class='myself-content'>
                    <p>Je suis un développeur junior, étudiant au sein de l'école WebForce3. Avec une expérience de
                        commercial,
                        je suis actuellement en reconversion pour changer de domaine d'activité.</p>

                    <a class="cv" target="_blank" href="assets/img/cv.pdf"> Mon CV</a>
                </div>
            </div>

            <div class="diploma from-right">
                <i class="fas fa-graduation-cap dip-img"></i>
                <div class="diploma-text">
                    <h3>Simplon.co</h3>
                    <b>Formation de développeur web et web mobile 2019 - 2020</b>
                    <p>Certification reconnu par l'Etat : OPQUAST - Maîtrise de la qualité en projet Web.</p>
                </div>
            </div>
            <div class="diploma from-left">
                <i class="fas fa-graduation-cap dip-img"></i>
                <div class="diploma-text">
                    <h3>WebForce3</h3>
                    <b>Formation de développeur web et web mobile 2020</b>
                    <p>Diplôme et certifications reconnus par l'Etat, titre professionnel RNCP de niveau 5 équivalent
                        BAC +2 et CNCP de catégorie C (techniques d’intégration Web et techniques de développement Web.
                    </p>
                </div>
            </div>

            <div class="description-content">
                <div class=" description-part gradient from-left">
                    <i class="far fa-lightbulb description-icon"></i>
                    <h3>Créatif</h3>
                    <p>J'ai toujours des nouvelles idées et cherche comment les assimiler aux projets sur lesquels je
                        travaille</p>
                </div>

                <div class="description-part gradient from-left">
                    <i class="far fa-smile description-icon"></i>
                    <h3>Passionné</h3>
                    <p>Je suis attiré depuis l'enfance par l'informatique et mon intérêt pour celui-ci me permet
                        d'apprendre constamment et de m'améliorer </p>
                </div>

                <div class=" description-part gradient from-right">
                    <i class="fas fa-sliders-h description-icon"></i>
                    <h3>Polyvalent</h3>
                    <p>Grâce à mes expériences passées, je sais m'organiser et faire face aux différentes situations et
                        imprévus qui peuvent intervenir</p>
                </div>

                <div class="description-part gradient from-right">
                    <i class="fas fa-battery-three-quarters description-icon"></i>
                    <h3>Déterminé</h3>
                    <p>Je ne lâche pas mes objectifs de vue et sais me donner les moyens pour les atteindre</p>
                </div>
            </div>
        </section>

        <section id=projects class="projects">

            <hr>

            <h2>Projets</h2>

            <div class="inline-projects">

                <a href="https://tousfemme.fr/" target="_blank" class="from-left projectc">
                    <img src="assets/img/tousfemme.png" alt="Association Tous femme" class="project1">
                    <p class="text-pr1">Tous femme</p>
                </a>

                <a href="vieniagustare/index.php" target="_blank" class="from-left projectc">
                    <img src="assets/img/vieniagustare.png" alt="Restaurant Vieni A Gustare" class="project2">
                    <p class="text-pr2">Vieni A Gustare</p>
                </a>

                <a href="meteo/index.html" target="_blank" class="from-right projectc">
                    <img src="assets/img/rain.jpg" alt="Météo AJAX" class="project3">
                    <p class="text-pr3">Météo AJAX</p>
                </a>

                <a href="#projects" class="from-right projectc">
                    <img src="assets/img/inprogress.jpg" alt="" class="project4">
                    <p class="text-pr4">Projet en cours</p>
                </a>

            </div>
        </section>

        <section id="contact" class="contact">

            <hr>

            <h2>Contact</h2>

            <p class="thanks"><?php if (isset($valid)) echo $valid ?></p>
            <form method="POST" action="">

                <input class="input1" id="firstname" type="text" name="firstname" placeholder="Prénom" value="<?php if (isset($_POST['firstname']) && isset($valid)) echo '';
                                                                                                                elseif (isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
                <p class="error"><?php if (isset($errorFirstname)) echo $errorFirstname ?></p>



                <input class="input1" id="lastname" type="text" name="lastname" placeholder="Nom" value="<?php if (isset($_POST['lastname']) && isset($valid)) echo '';
                                                                                                            elseif (isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
                <p class="error"><?php if (isset($errorLastname)) echo $errorLastname ?></p>



                <input class="input1" id="email" type="mail" name="email" placeholder="Email" value="<?php if (isset($_POST['email']) && isset($valid)) echo '';
                                                                                                        elseif (isset($_POST['email'])) echo $_POST['email']; ?>">
                <p class="error"><?php if (isset($errorEmail)) echo $errorEmail ?></p>



                <input class="input1" id="subject" type="text" name="subject" placeholder="Sujet" value="<?php if (isset($_POST['subject']) && isset($valid)) echo '';
                                                                                                            elseif (isset($_POST['subject'])) echo $_POST['subject']; ?>">
                <p class="error"><?php if (isset($errorSubject)) echo $errorSubject ?></p>


                <textarea type="text" id="message" class="message" name="message" placeholder="Votre message"><?php if (isset($_POST['message']) && isset($valid)) echo '';
                                                                                                                elseif (isset($_POST['message'])) echo $_POST['message']; ?></textarea>
                <p class="error"><?php if (isset($errorMessage)) echo $errorMessage ?></p>

                <button>Envoyer</button>
            </form>
        </section>
    </main>

    <footer>
        <p class="text-f"> &copy; Mathieu Montjarret 2020 - Tous droits réservés</p>
        <div class="inline-social">
            <a target="_blank" href="https://github.com/mathieu-montjarret?tab=repositories"><i class="fab fa-github-square fa-2x git"></i></a>
            <a target="_blank" href="https://www.linkedin.com/in/mathieu-montjarret-327410145/"><i class="fab fa-linkedin fa-2x linkedin"></i></a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>

</html>