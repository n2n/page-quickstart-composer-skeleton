<?php
    use n2n\impl\web\ui\view\html\HtmlView;
    use qs6\model\BlogCommentForm;
 
    $view = HtmlView::view($this);
    $html = HtmlView::html($view);
    $formHtml = HtmlView::formHtml($view);
     
    $commentForm = $view->getParam('commentForm');
    $view->assert($commentForm instanceof BlogCommentForm);
     
    $view->useTemplate('\qst\view\boilerplate.html');
     
?>

<h1>Kommentar schreiben</h1>
 
<?php $formHtml->open($commentForm) ?>
    <?php // $formHtml->messageList(null, array('class' => 'alert alert-danger list-unstyled')) ?>
    <div class="form-group row<?php $formHtml->outOnError('email', ' has-danger') ?>">
        <?php $formHtml->label('email', null, array("class" => "col-sm-3 col-lg-2 col-form-label")) ?>
    	<div class="col-sm-9 col-lg-4">
	        <?php $formHtml->input('email', array('maxlength' => 120, 'class' => 'form-control')) ?>
	        <?php $formHtml->message('email', 'div', array('class' => 'form-control-feedback')) ?>
    	</div>
    </div>
    <div class="form-group row<?php $formHtml->outOnError('content', ' has-danger') ?>">
        <?php $formHtml->label('content', null, array("class" => "col-sm-3 col-lg-2 col-form-label")) ?>
        <div class="col-sm-9 col-lg-4">
	        <?php $formHtml->textarea('content', array('rows' => 5, 'cols' => 30, 'class' => 'form-control')) ?>
	        <?php $formHtml->message('content', 'div', array('class' => 'form-control-feedback')) ?>
	    </div>    
    </div>
    <div class="form-group row<?php $formHtml->outOnError('image', ' has-danger') ?>">
        <?php $formHtml->label('image', null, array("class" => "col-sm-3 col-lg-2 col-form-label"))?>
        <div class="col-sm-9 col-lg-4">
        	<?php $formHtml->inputFileWithLabel('image') ?>
        	<?php $formHtml->message('image', 'div', array('class' => 'form-control-feedback'))?>
        </div>
    </div>
    <div class="form-group row">
	    <div class="col-sm-9 col-lg-4 offset-sm-3 offset-lg-2">
	    	<?php $formHtml->buttonSubmit('save', 'Kommentar speichern', array('class' => 'btn btn-primary'))?>
	    </div>
    </div>
<?php $formHtml->close() ?>