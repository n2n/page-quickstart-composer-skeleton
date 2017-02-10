<?php
    use n2n\impl\web\ui\view\html\HtmlView;
    use n2n\web\ui\view\View;
    use qs6\bo\BlogArticle;
use page\ui\PageHtmlBuilder;
 
    $view = HtmlView::view($this);
    $html = HtmlView::html($view);
    $pageHtml = new PageHtmlBuilder($view);
    
    $blogArticles = $view->getParam('blogArticles');
     
    $view->useTemplate('\qst\view\boilerplate.html');
    
?>

<h1><?php $pageHtml->title() ?></h1>

<?php foreach ($blogArticles as $blogArticle): $view->assert($blogArticle instanceof BlogArticle) ?>
    <article>
        <h2><?php $html->out($blogArticle->getTitle()) ?></h2>
        <p><?php $html->out($blogArticle->getLead()) ?></p>
        <?php $html->linkToController($blogArticle->getUrlPart(), 'lesen', array('class' => 'btn btn-primary')) ?>
    </article>
<?php endforeach ?>