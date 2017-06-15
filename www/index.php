<?php

require dirname(__DIR__ ) . "/Core/config.inc.php";

use Emagine\BLL\CurriculoBLL;
use Emagine\Model\ProjetoInfo;

$regraCurriculo = new CurriculoBLL();
$curriculo = $regraCurriculo->carregarJson("rodrigo.json", "pt_BR");

?>
    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
    <!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <title><?php echo $curriculo->getNome(); ?> | Curriculum Vitae</title>
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="<?php echo $curriculo->getResumo(); ?>" />
        <meta name="author" content="Rodrigo Landim" />
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
            <a href="#profession-hidden" class="hidden-btn">Visualizar mais cargos <i class="fa fa-chevron-down"></i></a>
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
            <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
            <div class="intro">
                <p>Segue abaixo alguns dos projetos que desensenvolvi:</p>
            </div>
            <?php foreach ($curriculo->listarProjetoVisivel() as $projeto) : ?>
            <div class="item">
                <span class="project-title">
                    <?php if (isNullOrEmpty($projeto->getUrl())) : ?>
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
                                <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-android"></i> Baixe no Google Play</a>
                            <?php elseif ($link->getTipo() == ProjetoInfo::IOS) : ?>
                                <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-apple"></i> Baixe na Apple</a>
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
            <a href="#project-hidden" class="hidden-btn">Visualizar mais projetos <i class="fa fa-chevron-down"></i></a>
            <div id="project-hidden" style="display: none;">
                <?php foreach ($curriculo->listarProjetoEscondido() as $projeto) : ?>
                    <div class="item">
                <span class="project-title">
                    <?php if (isNullOrEmpty($projeto->getUrl())) : ?>
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
                                        <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-android"></i> Baixe no Google Play</a>
                                    <?php elseif ($link->getTipo() == ProjetoInfo::IOS) : ?>
                                        <a target="_blank" href="<?php echo $link->getUrl(); ?>"><i class="fa fa-apple"></i> Baixe na Apple</a>
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

            <div class="item">
                <span class="project-title"><a href="http://www.wimoveis.com.br">Wimoveis</a></span> -
                <span class="project-tagline">
                    Maior portal imobiliário do Distrito Federal, possuia 90% do mercado brasiliense até novembro de
                    2011, vendido ao portal ImovelWeb por mais de 50 milhões. Fui responsável pelo desenovimento de
                    todo o projeto.
                </span>
                <ul>
                    <li>Website: <a href="http://wimoveis.com.br" target="_blank">http://wimoveis.com</a></li>
                </ul>
                <div>
                    <span class="label label-primary">c#.NET</span>
                    <span class="label label-info">SQL Server</span>
                    <span class="label label-success">WebServices</span>
                    <span class="label label-success">AJAX</span>
                    <span class="label label-success">HTML5</span>
                    <span class="label label-success">CSS</span>
                    <span class="label label-success">Unit</span>
                    <span class="label label-success">Silverlight</span>
                </div>
            </div>
            <div class="item">
                <span class="project-title"><a target="_blank" href="http://simeon.com.br">Simeon</a></span> -
                <span class="project-tagline">
                    Estratégia para ação - é uma solução feita para apoiar organizações na execução da estratégia.
                    Desenvolvi a versão desse sistema para Android e iOS.
                </span>
                <ul>
                    <li>
                        EPA para
                        <a href="https://play.google.com/store/apps/details?id=simeon.com.br.appepa"
                           target="_blank"><i class="fa fa-android"></i> Android</a> e
                        <a href="#" target="_blank"><i class="fa fa-apple"></i> iOS</a>
                    </li>
                </ul>
                <div>
                    <span class="label label-primary">Xamarin</span>
                    <span class="label label-primary">c#.NET</span>
                    <span class="label label-info">SQLite</span>
                    <span class="label label-success">API RestFul</span>
                </div>
            </div>
            <div class="item">
                <span class="project-title">Radar Mais</span> -
                <span class="project-tagline">
                    O Radar Mais é o mais novo aplicativo que te alerta sobre diversos tipos de radares que serão
                    encontrados durante o seu percurso, seja ele qual for! Foi desenvolvido para ser utilizado sem
                    estar conectado com a internet facilitando o seu uso em áreas onde o sinal de celular não esteja
                    funcionando além de economizar o consumo da internet no celular.
                </span>
                <ul>
                    <li>
                        Radar Mais para
                        <a href="https://play.google.com/store/apps/details?id=br.com.cmapps.radar"
                           target="_blank"><i class="fa fa-android"></i> Android</a> e
                        <a href="https://itunes.apple.com/ar/app/radar-mais/id1182364929?mt=8"
                           target="_blank"><i class="fa fa-apple"></i> iOS</a>
                    </li>
                    <li>
                        Radar Mais Pro para
                        <a href="https://play.google.com/store/apps/details?id=br.com.cmapps.radarpro"
                           target="_blank"><i class="fa fa-android"></i> Android</a> e
                        <a href="https://itunes.apple.com/ar/app/radar-mais/id1182364929?mt=8"
                           target="_blank"><i class="fa fa-apple"></i> iOS</a>
                    </li>
                </ul>
                <div>
                    <span class="label label-primary">Xamarin</span>
                    <span class="label label-primary">c#.NET</span>
                    <span class="label label-info">SQLite</span>
                    <span class="label label-success">API RestFul</span>
                </div>
            </div>
            <div class="item">
                <span class="project-title"><a href="https://imobsync.com" target="_blank">Imobsync</a></span> -
                <span class="project-tagline">
                    Sistema completo de gestão imobiliária com criação de sites templates, CRM imobiliário, integração
                    com portais, integração com Facebook, etc.
                </span>
                <ul>
                    <li>
                        Website: <a href="https://imobsync.com" target="_blank">http://imobsync.com</a>
                    </li>
                </ul>
                <div>
                    <span class="label label-primary">PHP</span>
                    <span class="label label-primary">Angular</span>
                    <span class="label label-primary">Javascript</span>
                    <span class="label label-primary">JQuery</span>
                    <span class="label label-primary">HTML5</span>
                    <span class="label label-primary">Bootstrap</span>
                    <span class="label label-primary">Less</span>
                    <span class="label label-info">MySQL</span>
                    <span class="label label-info">PHP Slim Framework</span>
                    <span class="label label-success">PHPUnit</span>
                    <span class="label label-success">API RestFul</span>
                    <span class="label label-success">Apache</span>
                    <span class="label label-success">PowerDNS</span>
                </div>
            </div>
            <a href="#project-hidden" class="hidden-btn">Visualizar mais projetos <i class="fa fa-chevron-down"></i></a>
            <div id="project-hidden" style="display: none;">
                <div class="item">
                    <span class="project-title"><a href="http://www.emagine.com.br">Emagine</a></span> -
                    <span class="project-tagline">
                    Desenvolvi um padrão de websites baseados em Wordpress e vários projetos personalizados para clientes.
                </span>
                    <ul>
                        <li>Website: <a href="http://emagine.com.br" target="_blank">http://emagine.com.br</a></li>
                    </ul>
                    <div>
                        <span class="label label-primary">PHP</span>
                        <span class="label label-primary">Wordpress</span>
                        <span class="label label-primary">Javascript</span>
                        <span class="label label-info">Bootstrap</span>
                        <span class="label label-info">JQuery</span>
                        <span class="label label-info">HTML5</span>
                        <span class="label label-info">Less</span>
                        <span class="label label-success">MySQL</span>
                        <span class="label label-success">PostGreSQL</span>
                    </div>
                </div>
                <div class="item">
                    <span class="project-title">Unico Calc</span> -
                    <span class="project-tagline">
                    Calculadora exclusiva de usinagem para a Único Asfaltos.
                </span>
                    <ul>
                        <li>
                            UnicoCalc para
                            <a href="https://play.google.com/store/apps/details?id=br.com.ClubManagementApps.UnicoCalc"
                               target="_blank"><i class="fa fa-android"></i> Android</a> e
                            <a href="https://itunes.apple.com/pt/app/unicocalc/id1160854486?l=en&mt=8"
                               target="_blank"><i class="fa fa-apple"></i> iOS</a>
                        </li>
                    </ul>
                    <div>
                        <span class="label label-primary">Appcelerator</span>
                        <span class="label label-primary">Titanium</span>
                        <span class="label label-info">SQLite</span>
                        <span class="label label-success">API RestFul</span>
                    </div>
                </div>
                <div class="item">
                    <span class="project-title"><a href="http://www.pavmanager.com.br">PAVmanager</a></span> -
                    <span class="project-tagline">
                    O PAVmanager é um sistema de gestão de obras de pavimentação essencial para sua empresa. Através
                    dele você pode gerenciar online e offline, todas as fases de sua obra, de onde estiver e em tempo
                    real.
                </span>
                    <ul>
                        <li>
                            PAVmanager para
                            <a href="https://play.google.com/store/apps/details?id=br.com.ClubManagement.PAVmanager"
                               target="_blank"><i class="fa fa-android"></i> Android</a> e
                            <a href="https://itunes.apple.com/pt/app/pavmanager/id1090884915?l=en&mt=8"
                               target="_blank"><i class="fa fa-apple"></i> iOS</a>
                        </li>
                    </ul>
                    <div>
                        <span class="label label-primary">c#.NET</span>
                        <span class="label label-primary">Appcelerator</span>
                        <span class="label label-primary">Titanium</span>
                        <span class="label label-info">MySQL</span>
                        <span class="label label-info">SQLite</span>
                        <span class="label label-success">API RestFul</span>
                    </div>
                </div>
            </div>
        </section><!--//section-->
        <?php endif; ?>
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