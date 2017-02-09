<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2n\web\ui\view\View;
	use qs6\bo\BlogArticle;
	
	$view = HtmlView::view($this);
	$html = HtmlView::html($view);
	 
	$blogArticle = $view->getParam('blogArticle');
	$view->assert($blogArticle instanceof BlogArticle);
	 
	$view->useTemplate('\qst\view\boilerplate.html');
?>
<div class="container">
	<h1>Kommentar erfasst</h1>
	<p>Danke für deinen Kommentar</p>
	<?php $html->linkToController($blogArticle->getUrlPart(), 'zurück zum Artikel') ?>
</div>