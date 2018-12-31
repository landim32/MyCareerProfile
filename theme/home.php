<?php

namespace Landim32\MyCareerProfile\Theme;

use Landim32\MyCareerProfile\Model\CurriculoInfo;
use Landim32\MyCareerProfile\Model\ProjetoInfo;

/**
 * @var CurriculoInfo $curriculo
 */

?>
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="<?php echo IDIOMA; ?>" class="ie8"> <![endif]-->
    <!--[if IE 9]> <html lang="<?php echo IDIOMA; ?>" class="ie9"> <![endif]-->
    <!--[if !IE]><!--> <html lang="<?php echo IDIOMA; ?>"> <!--<![endif]-->
    <head>
        <title><?php echo $curriculo->getNome(); ?> | <?php echo _("Curriculum Vitae"); ?></title>
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="<?php echo $curriculo->getResumo(); ?>" />
        <meta name="author" content="Rodrigo Landim" />
        <link rel="shortcut icon" href="<?php echo TEMA_PATH; ?>/favicon.png" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="<?php echo TEMA_PATH; ?>/plugins/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo TEMA_PATH; ?>/plugins/font-awesome/css/font-awesome.css" />
        <link id="theme-style" rel="stylesheet" href="<?php echo TEMA_PATH; ?>/css/styles.css" />
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>
<a href="https://github.com/landim32/MyCareerProfile">
    <img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png">
</a>
<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="profile-container">
            <img class="profile img-responsive img-circle" src="<?php echo get_gravatar($curriculo->getEmail1(), 100) ?>" alt="<?php echo $curriculo->getNome(); ?>" />
            <h1 class="name"><?php echo $curriculo->getNome(); ?></h1>
            <h3 class="tagline"><?php echo $curriculo->getCargoAtual(); ?></h3>
            <div style="margin-top: 12px;">
                <a target="_blank" href="<?php echo BASE_PATH . "/" . IDIOMA . "/" . PROFILE . ".pdf"; ?>">
                    <i class="fa fw fa-download"></i> <?php echo _("Download PDF"); ?>
                </a>
            </div>
        </div><!--//profile-container-->

        <div class="contact-container container-block">
            <ul class="list-unstyled contact-list">
                <?php if (!isNullOrEmpty($curriculo->getEmail1())) : ?>
                <li class="email" style="word-wrap: break-word; white-space: nowrap;">
                    <i class="fa fa-fw fa-envelope"></i><a href="mailto:<?php echo $curriculo->getEmail1(); ?>"><?php echo $curriculo->getEmail1(); ?></a>
                </li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getTelefone1())) : ?>
                <li class="phone">
                    <i class="fa fa-fw fa-whatsapp"></i><a
                        href="https://api.whatsapp.com/send?phone=+<?php echo
                        preg_replace('/\D/', '', $curriculo->getTelefone1());
                        ?>&text=Oi"><?php echo $curriculo->getTelefone1(); ?>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getWebsite())) : ?>
                <li class="website">
                    <i class="fa fa-fw fa-globe"></i><a href="http://<?php echo $curriculo->getWebsite(); ?>" target="_blank"><?php echo $curriculo->getWebsite(); ?></a>
                </li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getLinkedin())) : ?>
                <li class="linkedin">
                    <i class="fa fa-fw fa-linkedin"></i><a href="<?php echo $curriculo->getLinkedinUrl(); ?>" target="_blank">#<?php echo $curriculo->getLinkedin(); ?></a>
                </li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getGithub())) : ?>
                <li class="github"><i class="fa fa-fw fa-github"></i><a href="<?php echo $curriculo->getGithubUrl(); ?>" target="_blank">github.com/<?php echo $curriculo->getGithub(); ?></a></li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getTwitter())) : ?>
                <li class="twitter"><i class="fa fa-fw fa-twitter"></i><a href="<?php echo $curriculo->getTwitterUrl(); ?>" target="_blank">@<?php echo $curriculo->getTwitter(); ?></a></li>
                <?php endif; ?>
                <?php if (!isNullOrEmpty($curriculo->getVimeo())) : ?>
                    <li class="vimeo">
                        <i class="fa fa-fw fa-vimeo"></i><a href="<?php echo $curriculo->getVimeoUrl(); ?>" target="_blank">@<?php echo $curriculo->getVimeo(); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div><!--//contact-container-->
        <?php if (count($curriculo->listarCurso()) > 0) : ?>
        <div class="education-container container-block">
            <h2 class="container-block-title"><?php echo _("Education"); ?></h2>
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
            <h2 class="container-block-title"><?php echo _("Languages"); ?></h2>
            <ul class="list-unstyled interests-list">
                <?php foreach ($curriculo->listarLingua() as $lingua) : ?>
                <li><?php echo $lingua->getNome(); ?> <span class="lang-desc">(<?php echo $lingua->getTipoStr(); ?>)</span></li>
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
        <div class="text-right">
            <?php if (IDIOMA == "en") : ?>
                <a href="<?php echo BASE_PATH . "/pt_BR"; ?>"><?php echo _("Portuguese") ?></a> -
                <?php echo _("English") ?>
            <?php else : ?>
                <?php echo _("Portuguese") ?> -
                <a href="<?php echo BASE_PATH . "/en"; ?>"><?php echo _("English") ?></a>
            <?php endif; ?>
        </div>
        <section class="section summary-section">
            <h2 class="section-title"><i class="fa fa-user"></i><?php echo _("Career Profile"); ?></h2>
            <div class="summary">
                <p>
                    <?php echo $curriculo->getResumo(); ?>
                </p>
            </div><!--//summary-->
        </section><!--//section-->
        <?php if (count($curriculo->listarCargo()) > 0) : ?>
        <section class="section experiences-section">
            <h2 class="section-title"><i class="fa fa-briefcase"></i><?php echo _("Experiences"); ?></h2>
            <?php foreach ($curriculo->listarCargoVisivel() as $cargo) : ?>
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
            <?php if (count($curriculo->listarCargoEscondido()) > 0) : ?>
            <a href="#profession-hidden" class="hidden-btn"><?php echo _("View more experiences"); ?> <i class="fa fa-chevron-down"></i></a>
            <div id="profession-hidden" style="display: none;">
                <?php foreach ($curriculo->listarCargoEscondido() as $cargo) : ?>
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
            </div>
            <?php endif; ?>
        </section><!--//section-->
        <?php endif; ?>
        <?php if (count($curriculo->listarProjeto()) > 0) : ?>
        <section class="section projects-section">
            <h2 class="section-title"><i class="fa fa-archive"></i><?php echo _("Projects"); ?></h2>
            <div class="intro">
                <p><?php echo _("Here are some of the projects developed for me"); ?>:</p>
            </div>
            <?php foreach ($curriculo->listarProjetoVisivel() as $projeto) : ?>
            <div class="item">
                <span class="project-title">
                    <?php if (!isNullOrEmpty($projeto->getUrl())) : ?>
                        <a target="_blank" href="<?php echo $projeto->getUrl(); ?>"><?php echo $projeto->getNome(); ?></a>
                    <?php else : ?>
                        <?php echo $projeto->getNome(); ?>
                    <?php endif; ?>
                </span> -
                <span class="project-tagline"><?php echo $projeto->getDescricao(); ?></span>
                <ul>
                    <?php foreach ($projeto->listarLinks() as $link) : ?>
                        <li>
                            <?php echo $link->getNome(); ?>:
                            <?php if ($link->getTipo() == ProjetoInfo::ANDROID) : ?>
                                <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-android"></i> <?php echo sprintf(_("Download from %s"),"Google Play"); ?></a>
                            <?php elseif ($link->getTipo() == ProjetoInfo::IOS) : ?>
                                <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-apple"></i> <?php echo sprintf(_("Download from %s"), "Apple"); ?></a>
                            <?php else : ?>
                                <a target="_blank" href="<?php echo $link->getUrl(); ?>"><?php echo $link->getUrl(); ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php if (count($projeto->listarConhecimento()) > 0) : ?>
                <div>
                    <?php foreach ($projeto->listarConhecimento() as $conhecimento) : ?>
                        <span class="<?php echo "label label-" . $conhecimento->getEstilo(); ?>"><?php echo $conhecimento->getNome(); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
            <?php if (count($curriculo->listarProjetoEscondido()) > 0) : ?>
            <a href="#project-hidden" class="hidden-btn"><?php echo _("View more projects"); ?> <i class="fa fa-chevron-down"></i></a>
            <div id="project-hidden" style="display: none;">
                <?php foreach ($curriculo->listarProjetoEscondido() as $projeto) : ?>
                    <div class="item">
                <span class="project-title">
                    <?php if (!isNullOrEmpty($projeto->getUrl())) : ?>
                        <a target="_blank" href="<?php echo $projeto->getUrl(); ?>"><?php echo $projeto->getNome(); ?></a>
                    <?php else : ?>
                        <?php echo $projeto->getNome(); ?>
                    <?php endif; ?>
                </span> -
                        <span class="project-tagline"><?php echo $projeto->getDescricao(); ?></span>
                        <ul>
                            <?php foreach ($projeto->listarLinks() as $link) : ?>
                                <li>
                                    <?php echo $link->getNome(); ?>:
                                    <?php if ($link->getTipo() == ProjetoInfo::ANDROID) : ?>
                                        <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-android"></i> <?php echo sprintf(_("Download from %s"),"Google Play"); ?></a>
                                    <?php elseif ($link->getTipo() == ProjetoInfo::IOS) : ?>
                                        <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-apple"></i> <?php echo sprintf(_("Download from %s"),"Apple"); ?></a>
                                    <?php else : ?>
                                        <a target="_blank" href="<?php echo $link->getUrl(); ?>"><?php echo $link->getUrl(); ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if (count($projeto->listarConhecimento()) > 0) : ?>
                            <div>
                                <?php foreach ($projeto->listarConhecimento() as $conhecimento) : ?>
                                    <span class="<?php echo "label label-" . $conhecimento->getEstilo(); ?>"><?php echo $conhecimento->getNome(); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </section><!--//section-->
        <?php endif; ?>
        <?php if (count($curriculo->listarConhecimento()) > 0) : ?>
        <section class="skills-section section">
            <h2 class="section-title"><i class="fa fa-rocket"></i><?php echo _("Skills"); ?></h2>
            <div class="skillset">
                <?php foreach ($curriculo->listarConhecimentoVisivel() as $conhecimento) : ?>
                <div class="item">
                    <h3 class="level-title"><?php echo $conhecimento->getNome(); ?></h3>
                    <div class="level-bar">
                        <div class="level-bar-inner" data-level="<?php echo $conhecimento->getPorcentagem() . "%"; ?>">
                        </div>
                    </div><!--//level-bar-->
                </div><!--//item-->
                <?php endforeach; ?>
                <?php if (count($curriculo->listarConhecimentoOculto()) > 0) : ?>
                <a href="#skill-hidden" class="hidden-btn"><?php echo _("View more skills"); ?> <i class="fa fa-chevron-down"></i></a>
                <div id="skill-hidden" style="display: none;">
                    <?php foreach ($curriculo->listarConhecimentoOculto() as $conhecimento) : ?>
                        <div class="item">
                            <h3 class="level-title"><?php echo $conhecimento->getNome(); ?></h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" data-level="<?php echo $conhecimento->getPorcentagem() . "%"; ?>">
                                </div>
                            </div><!--//level-bar-->
                        </div><!--//item-->
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section><!--//skills-section-->
        <?php endif; ?>

    </div><!--//main-body-->
</div>
<footer class="footer">
    <div class="text-center">
        <small class="copyright"><?php echo sprintf( _("Designed by %s for developers"), "<a href=\"http://themes.3rdwavemedia.com\" target=\"_blank\">Xiaoying Riley</a>"); ?></small>
    </div><!--//container-->
</footer><!--//footer-->
<script type="text/javascript" src="<?php echo TEMA_PATH; ?>/plugins/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo TEMA_PATH; ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo TEMA_PATH; ?>/js/main.js"></script>
</body>
</html>