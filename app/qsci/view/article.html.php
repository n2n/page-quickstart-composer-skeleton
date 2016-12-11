<?php
use n2n\impl\web\ui\view\html\HtmlView;
use n2n\web\ui\view\View;
use rocket\spec\ei\component\field\impl\string\wysiwyg\WysiwygHtmlBuilder;
use n2n\io\managed\img\impl\ThSt;

$view = HtmlView::view($this);
$html = HtmlView::html($view);
 
$article = $view->getParam('article');
$view->assert($article instanceof QsciArticle);
 
$htmlWysiwyg = new WysiwygHtmlBuilder($view);

?>
<article class="ci ci-article row">
    <div class="col-sm-4">
        <?php $html->image($article->getFileImage(), ThSt::crop(400, 300), array('class' => 'img-fluid')) ?>
    </div>
    <div class="col-sm-8">
        <h2><?php $html->out($article->getTitle()) ?></h2>
        <?php $htmlWysiwyg->out($article->getDescriptionHtml()) ?>
    </div>
</article>