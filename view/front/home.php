
<?php 
$title = "Home";
ob_start()
?>

<div class="banner-box">
    <img src="public/img/banner.jpg" alt="bannière représentant des rameurs d'aviron" class="banner-img">
    <div class="banner-absolute-box">
        <div class="centered-box banner-centered-box">
            <h2 class="banner-title">Bienvenue sur mon site web</h2>
            <p class="banner-description">Aviron, études et alimentation, une partie de ma vie est là. Retrouvez le reste <a href="index.php?action=blogProgrammation" style="color:lightblue">ici</a></p>
        </div>
    </div>
</div>

<?php $dataArticle = $articlePreview->fetch() ?>
<div class="centered-box">
    <article class="articlePreview first-articlePreview">
        <?php if (isset($dataArticle["vizu_img"]) AND !empty($dataArticle["vizu_img"])) { ?>
            <div class="articlePreview-img-container">
                <a href="index.php?action=showAnArticle&id=<?= $dataArticle['id'] ?>" class="articlePreview-linkImg">
                    <p class="visualization-p">Lire l'article en entier</p>
                    <img src="public/img/<?= $dataArticle["vizu_img"] ?>" alt="Image illustrative de blog" class="articlePreview-img">
                </a>
            </div>
        <?php } ?>
        <h2 class="articlePreview-title"><a href="index.php?action=showAnArticle&id=<?= $dataArticle['id'] ?>" >(NEW) <?= $dataArticle["title"] ?></a></h2>
        <p class="articlePreview-paragraphe">
            <?= $dataArticle["pre_content"] ?>
        </p>
        <div class="articlePreview-footer">
            <a href="index.php?action=showAnArticle&id=<?= $dataArticle['id'] ?>">Posté le <?= $dataArticle["date"] ?> par <?= $dataArticle["writter"] ?></a>
            <div>
                <img src="public/img/eye.svg" alt="icone oeil"> x
                <img src="public/img/thumbs-up.svg" alt="icone like"> <?= $dataArticle["nb_like"] ?>
                <img src="public/img/chat.svg" alt="icone commentaires"> <?= $dataArticle["nb_comment"] ?>
            </div>
        </div>
    </article>
</div>

<main class="centered-box main">

    <section class="articlesPreviews-section">
        <?php while ($dataArticle = $articlePreview->fetch()) { ?>
            <article class="articlePreview">
                <?php if (isset($dataArticle["vizu_img"]) AND !empty($dataArticle["vizu_img"])) { ?>
                    <div class="articlePreview-img-container">
                        <a href="index.php?action=showAnArticle&id=<?= $dataArticle['id'] ?>" class="articlePreview-linkImg">
                            <p class="visualization-p">Lire l'article en entier</p>
                            <img src="public/img/<?= $dataArticle["vizu_img"] ?>" alt="Image illustrative de blog" class="articlePreview-img">
                        </a>
                    </div>
                <?php } ?>
                <h2 class="articlePreview-title"><a href="index.php?action=showAnArticle&id=<?= $dataArticle['id'] ?>" ><?= $dataArticle["title"] ?></a></h2>
                <p class="articlePreview-paragraphe">
                    <?= $dataArticle["pre_content"] ?>
                </p>
                <div class="articlePreview-footer">
                    <a href="index.php?action=showAnArticle&id=<?= $dataArticle['id'] ?>">Posté le <?= $dataArticle["date"] ?> par <?= $dataArticle["writter"] ?></a>
                    <div>
                        <img src="public/img/eye.svg" alt="icone oeil"> x
                        <img src="public/img/thumbs-up.svg" alt="icone like"> <?= $dataArticle["nb_like"] ?>
                        <img src="public/img/chat.svg" alt="icone commentaires"> <?= $dataArticle["nb_comment"] ?>
                    </div>
                </div>
            </article>
        <?php 
        } 
        $articlePreview->closeCursor()
        ?>

    </section>

    <section class="aside-section">

        <aside class="aside">
            <div class="aside-header">
                <h3>Mini-bio</h3>
            </div>
            <img src="https://placehold.it/50x50" alt="image de profil" class="profil-img">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae voluptatem optio necessitatibus provident quasi, hic in accusantium repellat reiciendis itaque. Minus tempore, officiis corrupti quam suscipit id esse iure nihil?Qui laudantium vel magnam voluptatibus eos, minima consequatur laborum dolores magni rem iusto, quisquam facilis numquam non, est soluta voluptas! Unde facere atque nulla pariatur sunt laudantium eaque iusto ducimus.</p>
        </aside>

        <aside class="aside">
            <div class="aside-header">
                <h3>Catégories</h3>
            </div>
            <ul>
                <li><a href="">Programmation</a></li>
                <li><a href="">Sport</a></li>
                <li><a href="">Végétarisme</a></li>
                <li><a href="">Études</a></li>
            </ul>
        </aside>
    </section>
</main>


<?php
$content = ob_get_clean() ;
require("template.php");
?>

