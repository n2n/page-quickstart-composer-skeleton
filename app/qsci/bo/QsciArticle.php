<?php
namespace qsci\bo;

use n2n\impl\web\ui\view\html\HtmlView;
use rocket\spec\ei\component\field\impl\ci\model\ContentItem;
use n2n\io\managed\File;
use n2n\persistence\orm\annotation\AnnoManagedFile;
use n2n\reflection\annotation\AnnoInit;

class QsciArticle extends ContentItem {
	private static function _annos(AnnoInit $ai) {
		$ai->p('fileImage', new AnnoManagedFile());
	}

	private $title;
	private $descriptionHtml;
	private $fileImage;

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getDescriptionHtml() {
		return $this->descriptionHtml;
	}

	public function setDescriptionHtml($descriptionHtml) {
		$this->descriptionHtml = $descriptionHtml;
	}

	/**
	 * @return File
	 */
	public function getFileImage() {
		return $this->fileImage;
	}

	/**
	 * @param File $fileImage
	 */
	public function setFileImage(File $fileImage) {
		$this->fileImage = $fileImage;
	}

	public function createUiComponent(HtmlView $view) {
		return $view->getImport('\ci\view\article.html', array ('article' => $this));
	}
}