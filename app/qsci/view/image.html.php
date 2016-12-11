<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2n\web\ui\view\View;
	use n2n\io\managed\img\impl\ThSt;
	use qsci\bo\QsciImage;
	
	$view = HtmlView::view($this);
	$html = HtmlView::html($view);
	 
	$image = $view->getParam('image');
	$view->assert($image instanceof QsciImage);
 
?>
<figure class="ci ci-image">
    <?php $html->image($image->getFileImage(), ThSt::prop(600, 400)) ?>
    <?php if (null !== ($title = $image->getTitle())): ?>
        <figcaption><?php $html->out($title) ?></figcaption>
    <?php endif; ?>
</figure>