<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2n\web\ui\view\View;
	use page\ui\PageHtmlBuilder;
	use n2n\core\N2N;
	use page\ui\nav\Nav;
	use n2n\impl\web\ui\view\html\HtmlBuilderMeta;
	
	$view = HtmlView::view($this);
	$html = HtmlView::html($view);
	$request = HtmlView::request($view);
	
	$pageHtml = new PageHtmlBuilder($view);
	$pageHtml->meta()->applyMeta();
	 
	$html->meta()->addMeta(array('charset' => N2N::CHARSET));
	// JQuery via Google
	$html->meta()->addJsUrl('https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js', false, false,
			array('integrity' => 'sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY',
					'crossorigin' => 'anonymous'), HtmlBuilderMeta::TARGET_BODY_END);
	// Tether CDN
	$html->meta()->addJsUrl('https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js', false, false,
			array('integrity' => 'sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB',
					'crossorigin' => 'anonymous'), HtmlBuilderMeta::TARGET_BODY_END);
	// CSS und JS für Bootstrap über CDN
	$html->meta()->addLink(array('rel' => 'stylesheet', 'crossorigin' => 'anonymous',
			'integrity' => 'sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj',
			'href' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css' ));
	$html->meta()->addJsUrl('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js',
			false, false, array('crossorigin' => 'anonymous'), HtmlBuilderMeta::TARGET_BODY_END);

	// CSS File für individuelle Stile
	$html->meta()->addCss('css/styles.css');
				 
?>
<!doctype html>
<html lang="<?php $html->out($request->getN2nLocale()->getId())?>">
    <?php $html->headStart() ?>
    <?php $html->headEnd() ?>
    <?php $html->bodyStart() ?>
        <nav class="navbar navbar-dark bg-inverse">
            <?php $html->linkToContext(null, $html->getImageAsset('img/logo.png', 'Logo'),
                    array('class' => 'navbar-brand')) ?>
            <?php $pageHtml->navigation(Nav::home(), array('class' => 'nav navbar-nav'), null,
                    array('class' => 'nav-item'), array('class' => 'nav-link')) ?>
            <div id="lang-navi">
                <?php $pageHtml->localeSwitch(array('class' => 'nav nav-inline'), array('class' => 'nav-item'),
                        array('class' => 'nav-link')) ?>
            </div>
        </nav>
    
      	<div class="container">
	        <?php $view->importContentView() ?>
      	</div>
          
    <?php $html->bodyEnd() ?>
</html>