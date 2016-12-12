<?php
namespace qsci\bo;

use n2n\impl\web\ui\view\html\HtmlView;
use n2n\impl\web\ui\view\html\HtmlElement;
use n2n\reflection\annotation\AnnoInit;
use n2n\persistence\orm\annotation\AnnoManagedFile;
use n2n\io\managed\File;
use rocket\spec\ei\component\field\impl\ci\model\ContentItem;

class QsciAttachment extends ContentItem {
	private static function _annos(AnnoInit $ai) {
		$ai->p('file', new AnnoManagedFile());
	}

	private $name;
	private $description;
	private $file;

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return File
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @param File $file
	 */
	public function setFile(File $file) {
		$this->file = $file;
	}

	public function createUiComponent(HtmlView $view) {
		$div = new HtmlElement('div', array('class' => 'ci ci-attachment'));
		
		$title = $this->name ? $this->name : $this->file->getOriginalName();
		$div->appendContent(new HtmlElement('h3', null, $this->getTitle()));
		
		if (null !== $this->description) {
			$div->appendContent(new HtmlElement('p', null, $this->description));
		}
		
	 	$div->appendContent(new HtmlElement('span', array('class' => 'glyphicon glyphicon-download'), ''));
	 	if ($this->file->isValid()) {
    		$div->appendContent(new HtmlElement('a', array('href' => $view->buildUrlStr($this->file, false), 
    				'target' => '_blank'), $this->file->getOriginalName()));
	 	}
		return $div;
	}
	
	private function getTitle() {
		if ($this->name) return $this->name;
		return $this->file->getOriginalName();
	}

}