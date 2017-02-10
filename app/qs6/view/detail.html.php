<?php
    use n2n\impl\web\ui\view\html\HtmlView;
    use n2n\web\ui\view\View;
    use qs6\bo\BlogArticle;
	use n2n\l10n\DateTimeFormat;
	use n2n\io\managed\img\impl\ThSt;
 
    $view = HtmlView::view($this);
    $html = HtmlView::html($view);
    
    $blogArticle = $view->getParam('blogArticle');
    $view->assert($blogArticle instanceof BlogArticle);
    $blogComments = $blogArticle->getComments();
    
    $view->useTemplate('\qst\view\boilerplate.html');
    
?>

<h1><?php $html->out($blogArticle->getTitle()) ?></h1>

<p><strong><?php $html->out($blogArticle->getLead()) ?></strong></p>
 
<strong>Artikel-Kategorien</strong>
<ul class="list-unstyled list-inline">
    <?php foreach ($blogArticle->getCategories() as $blogCategory): ?>
        <li class="list-inline-item"><span class="tag tag-default"><?php $html->out($blogCategory->getName()) ?></span></li>
    <?php endforeach ?>
</ul>
 
<?php $view->out($blogArticle->getContentHtml()) ?>

<h2>Kommentare</h2>
<p>
	<?php $html->linkToController(array('comment', $blogArticle->getId()), 'Kommentar verfassen', 
			array('class' => 'btn btn-primary')) ?>
</p>
 
<?php foreach ($blogComments as $blogComment): ?>
    <h3><?php $html->linkEmail($blogComment->getEmail()) ?></h3>
    <p><?php $html->escBr($blogComment->getContent()) ?></p>
    <p><strong>Datum:</strong> <?php $html->l10nDateTime($blogComment->getCreated(), DateTimeFormat::STYLE_LONG) ?></p>
    <?php if (null !== ($image = $blogComment->getImage())): ?>
        <?php $html->image($image, ThSt::prop(200, 300))?>
    <?php endif ?>
    <hr />
<?php endforeach ?>
 
<?php $html->linkToController(null, 'Zur Übersicht', array('class' => 'btn btn-secondary')) ?>