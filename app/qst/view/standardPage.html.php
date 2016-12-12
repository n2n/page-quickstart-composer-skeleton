<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2n\web\ui\view\View;
	use page\ui\PageHtmlBuilder;
	
	$view = HtmlView::view($view);
	$pageHtml = new PageHtmlBuilder($view);
	 
	$view->useTemplate('boilerplate.html');
?>
<div class="container">
    <h1><?php $pageHtml->title() ?></h1>
    <?php $pageHtml->contentItems('main') ?>
</div>