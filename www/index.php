<?php

require dirname(__DIR__ ) . "/Core/config.inc.php";

use Emagine\BLL\CurriculoBLL;

$regraCurriculo = new CurriculoBLL();
$curriculo = $regraCurriculo->carregarJson("rodrigo.json", "pt_BR");

?>
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
    <!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title>Responsive Resume/CV Template for Developers</title>
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers" />
        <meta name="author" content="Rodrigo Landim Carneiro" />
        <link rel="shortcut icon" href="favicon.png" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css" />
        <link id="theme-style" rel="stylesheet" href="css/styles.css" />
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>
<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="profile-container">
            <img class="profile img-responsive img-circle" src="<?php echo get_gravatar($curriculo->getEmail1(), 100) ?>" alt="<?php echo $curriculo->getNome(); ?>" />
            <h1 class="name"><?php echo $curriculo->getNome(); ?></h1>
            <h3 class="tagline">Full Stack Developer</h3>
        </div><!--//profile-container-->

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <?php if (!isNullOrEmpty($curriculo->getEmail1())) : ?>
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo $curriculo->getEmail1(); ?>"><?php echo $curriculo->getEmail1(); ?></a></li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getTelefone1())) : ?>
                <li class="phone"><i class="fa fa-phone"></i><a href="tel:55062996257590"><?php echo $curriculo->getTelefone1(); ?></a></li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getWebsite())) : ?>
                <li class="website"><i class="fa fa-globe"></i><a href="http://<?php echo $curriculo->getWebsite(); ?>" target="_blank"><?php echo $curriculo->getWebsite(); ?></a></li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getLinkedin())) : ?>
                <li class="linkedin"><i class="fa fa-linkedin"></i><a href="https://linkedin.com/in/<?php echo $curriculo->getLinkedin(); ?>" target="_blank">#<?php echo $curriculo->getLinkedin(); ?></a></li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getGithub())) : ?>
                <li class="github"><i class="fa fa-github"></i><a href="https://github.com/<?php echo $curriculo->getGithub(); ?>" target="_blank">github.com/<?php echo $curriculo->getGithub(); ?></a></li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getTwitter())) : ?>
                <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/<?php echo $curriculo->getTwitter(); ?>" target="_blank">@<?php echo $curriculo->getTwitter(); ?></a></li>
                <?php endif; ?>
            </ul>
        </div><!--//contact-container-->
        <?php if (count($curriculo->listarCurso()) > 0) : ?>
        <div class="education-container container-block">
            <h2 class="container-block-title">Education</h2>
            <?php foreach ($curriculo->listarGraduacao() as $graduacao) : ?>
            <div class="item">
                <h4 class="degree"><?php echo $graduacao->getCurso(); ?></h4>
                <h5 class="meta"><?php echo $graduacao->getInstituicao(); ?></h5>
                <div class="time"><?php echo $graduacao->getDataInicioAno(); ?> - <?php echo $graduacao->getDataTerminoAno(); ?></div>
            </div><!--//item-->
            <?php endforeach; ?>
        </div><!--//education-container-->
        <?php endif; ?>

        <?php if (count($curriculo->listarLingua()) > 0) : ?>
        <div class="languages-container container-block">
            <h2 class="container-block-title">Languages</h2>
            <ul class="list-unstyled interests-list">
                <?php foreach ($curriculo->listarLingua() as $lingua) : ?>
                <li><?php echo $lingua->getNome(); ?> <span class="lang-desc">(<?php echo $lingua->getTipo(); ?>)</span></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <!--div class="interests-container container-block">
            <h2 class="container-block-title">Interests</h2>
            <ul class="list-unstyled interests-list">
                <li>Climbing</li>
                <li>Snowboarding</li>
                <li>Cooking</li>
            </ul>
        </div>-->

    </div><!--//sidebar-wrapper-->
    <div class="main-wrapper">

        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
            <div class="summary">
                <p>
                    <?php echo $curriculo->getResumo(); ?>
                </p>
            </div><!--//summary-->
        </section><!--//section-->
        <?php if (count($curriculo->listarCargo()) > 0) : ?>
        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
            <?php foreach ($curriculo->listarCargo() as $cargo) : ?>
            <div class="item">
                <div class="meta">
                    <div class="upper-row">
                        <h3 class="job-title"><?php echo $cargo->getNome(); ?></h3>
                        <div class="time"><?php echo $cargo->getDataInicioStr(); ?> - <?php echo $cargo->getDataTerminoStr(); ?></div>
                    </div><!--//upper-row-->
                    <div class="company"><?php echo $cargo->getEmpresa(); ?></div>
                </div><!--//meta-->
                <div class="details">
                    <p><?php echo $cargo->getDescricao(); ?></p>
                    <?php foreach ($cargo->listarConhecimento() as $conhecimento) : ?>
                    <span class="<?php echo "label label-" . $conhecimento->getEstilo(); ?>"><?php echo $conhecimento->getNome(); ?></span>
                    <?php endforeach; ?>
                </div><!--//details-->
            </div><!--//item-->
            <?php endforeach; ?>
        </section><!--//section-->
        <hr />
        <?php endif; ?>
        <?php require __DIR__ . "/projeto.inc.php"; ?>
        <hr />
        <?php require __DIR__ . "/conhecimento.inc.php"; ?>

    </div><!--//main-body-->
</div>

<?php
echo "<pre>";
var_dump($curriculo);
echo "</pre>";
?>

<footer class="footer">
    <div class="text-center">
        <small class="copyright">Designed by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
    </div><!--//container-->
</footer><!--//footer-->

<!-- Javascript -->
<script type="text/javascript" src="plugins/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- custom js -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>