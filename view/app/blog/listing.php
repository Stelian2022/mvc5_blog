<h1>blog de merde</h1>
<section>
    <a href="<?=$view->path('add-article') ?>" class="button"> <button>Ajouter un article</button> </a>
    <?php foreach ($articles as $article):?>
        <article>
<a href="<?= $view->path('article', [$article->id_article]); ?>">
            <h4>
            <?= $article->titre ?> 
            </h4>
            <p> <?=substr($article->contenu,0,50). " (...)"?> </p>
        </a> 
           
        </article>
<!-- <p><img src="<?//= $article->image_url?>"></p>
<p><?//=$article->contenu?></p> -->
    </article>
    <?php endforeach; ?>
    </section>