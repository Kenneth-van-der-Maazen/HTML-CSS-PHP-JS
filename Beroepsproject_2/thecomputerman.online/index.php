<?php
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beroepsproject 2</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php
        include 'inc/NavBar.php';
        include_once("admin/data/Post.php");
        include_once("db_conn.php");
        $posts = getAll($conn);
        $categories = get5Categories($conn);
    ?>

<div class="container mt-5">
    <!-- INDEX PAGINA TEGELS -->
    <section class="row index-blog-posts">
        <div class="cards-wrapper">
            <?php foreach ($posts as $post) { ?>
            <div class="posts-container">
                <article class="cards-post">
                    <a href="blog-view.php?post_id=<?= $post['post_id'] ?>" class="card main-blog-card h-100 index-page-card">
                        <img src="upload/blog/<?= $post['cover_url'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title"><?= $post['post_title'] ?></h3>
                            <p class="card-date"><?= date('j F, Y', strtotime($post['crated_at'])) ?></p>
                        </div>
                    </a>
                </article>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- INDEX PAGINA CONTENT -->
    <section class="algemeen-section">
        <div class="container elementor-container">
            <div class="elementor-links elementor-column elementor-col-12 elementor-top-column elementor-element-populated">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-widget-container">
                            <section class="home-featured-cat">
                                <div class="penci-border-arrow style-5 penci-homepage-title pcalign-left pcicon-right">
                                    <h3 class="inner-arrow">
                                        <span>
                                            <span>ALGEMEEN</span>
                                            
                                        </span>
                                    </h3>
                                    
                                </div>
                                <div class="home-featured-cat-wrapper">
                                    <p>
                                    Rewilding Zuidoost houdt zich bezig met het beheer van de natuur en biodiversiteit in de omgeving Amsterdam Zuidoost.<br><br>
                                    Lorem ipsum dolor sit amet. Non adipisci error in sunt error hic veniam neque. Vel sint odit sed quia dolores eos laboriosam quam est quia laborum sed sequi omnis. Eum mollitia velit eos autem dolor quo alias nihil vel dolores dolores qui voluptatem voluptate. Aut suscipit earum et maxime numquam et sunt inventore id omnis praesentium.
                                    Et consequuntur voluptatibus eum debitis vitae est officia consequatur. Qui accusamus beatae 33 nemo quos sed dolor reprehenderit.
                                    Sed galisum numquam eos galisum cumque ea illum corrupti non aliquid culpa ex reiciendis dolor est debitis enim. Et pariatur dicta ut dolores ratione et asperiores distinctio aut labore obcaecati sit recusandae esse. Qui neque iusto et voluptate internos eum voluptatibus similique sit voluptas saepe.
                                    </p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-rechts penci-ercol-33 penci-sidebarSC elementor-column elementor-col-33 elementor-top-column elementor-element">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-widget elementor-widget-penci-sidebar">
                        <div class="elementor-widget-container">
                            <div id="sidebar" class="penci-sidebar-content penci-sidebar-content-vc pcicon-right">
                                <div class="theiaStickySidebar">
                                    <aside id="elementor-library-2" class="widget widget_elementor-library">
                                        <!-- DIVS OVERGESLAGEN -->
                                        <div class="elementor-widget-wrap">
                                            <section class="penci-section penci-structure-10 elementor-section elementor-top-section elementor-element elementor-section-boxed">
                                                <div class="elementor-widget-container">
                                                    <div class="affiliate-links-widget">
                                                        <h3 class="affiliate-widget-title">Externe Links</h3>
                                                        <p class="affiliate-widget-description">Homebrews en andere projecten.</p>
                                                        <br>
                                                        <ul class="affiliate-widget-links">
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-ravelry" aria-hidden="true"> Placeholder</i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-free-code-camp" aria-hidden="true"> Studeren</i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-archive" aria-hidden="true"> Archief</i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </aside>

                                    <aside id="elementor-library-2" class="widget widget_elementor-library">
                                        <!-- DIVS OVERGESLAGEN -->
                                        <div class="elementor-widget-wrap">
                                            <section class="penci-section penci-structure-10 elementor-section elementor-top-section elementor-element elementor-section-boxed">
                                                <div class="elementor-widget-container">
                                                    <div class="affiliate-links-widget">
                                                        
                                                        <h3 class="affiliate-widget-title">Nieuwsbrief</h3>
                                                        <p class="affiliate-widget-description">Meld je aan voor onze nieuwsbrief.</p>
                                                        
                                                        
                                                        <form action="#">

                                                        <div class="subscribe-container">
                                                            <input type="text" placeholder="Naam" name="naam" required><br><br>
                                                            <input type="email" placeholder="E-mail" name="email" required><br>
                                                            <label>
                                                                <input type="checkbox" checked="checked" name="subscribe"> Ik wil spam.
                                                            </label>
                                                        </div>
                                                        <div class="subscribe-container">
                                                            <input type="submit" value="Aanmelden">
                                                        </div>
                                                        
                                                        </form>

                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </aside>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<footer>
    <div class="footer-container">
        <div class="footer-main">
            <div class="footer-column">
                <h3 class="footer-heading">Heading one</h3>
                <a href="#" class="footer-link">Link 1</a>
                <a href="#" class="footer-link">Link 2</a>
                <a href="#" class="footer-link">Link 3</a>
            </div>
            <div class="footer-column">
                <h3 class="footer-heading">Heading one</h3>
                <a href="#" class="footer-link">Link 1</a>
                <a href="#" class="footer-link">Link 2</a>
                <a href="#" class="footer-link">Link 3</a>
            </div>
            <div class="footer-column">
                <h3 class="footer-heading">Heading one</h3>
                <a href="#" class="footer-link">Link 1</a>
                <a href="#" class="footer-link">Link 2</a>
                <a href="#" class="footer-link">Link 3</a>
            </div>
        </div>

        <div class="footer-bottom">
            <span class="copyright">&copy; 2025 Ernst Bobby en de rest.</span>
            <a href="#" class="footer-social"><i class="fa fa-facebook-f"></i></a>
            <a href="#" class="footer-social"><i class="fa fa-instagram"></i></a>
            <a href="#" class="footer-social"><i class="fa fa-youtube"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>