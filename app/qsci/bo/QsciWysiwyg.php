<?php
namespace qsci\bo;

use n2n\impl\web\ui\view\html\HtmlView;
use rocket\spec\ei\component\field\impl\string\wysiwyg\WysiwygHtmlBuilder;
use n2n\impl\web\ui\view\html\HtmlElement;
use rocket\spec\ei\component\field\impl\ci\model\ContentItem;

class QsciWysiwyg extends ContentItem {

	private $contentHtml;

	public function setContentHtml($contentHtml) {
		$this->contentHtml = $contentHtml;
	}

	public function getContentHtml() {
		return $this->contentHtml;
	}

	public function createUiComponent(HtmlView $view) {
		$wysiwygHtml = new WysiwygHtmlBuilder($view);
		return new HtmlElement('div', array('class' => 'ci ci-wysiwyg'), $wysiwygHtml->getWysiwygContent($this->contentHtml));
	}
}