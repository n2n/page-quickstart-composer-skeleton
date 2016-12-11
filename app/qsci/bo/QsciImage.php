<?php
namespace qsci\bo;

use rocket\spec\ei\component\field\impl\ci\model\ContentItem;
use n2n\reflection\annotation\AnnoInit;
use n2n\persistence\orm\annotation\AnnoManagedFile;
use n2n\impl\web\ui\view\html\HtmlView;
use n2n\io\managed\File;

class QsciImage extends ContentItem {
	private static function _annos(AnnoInit $ai) {
		$ai->p('fileImage', new AnnoManagedFile());
	}

	protected $title;
	protected $fileImage;

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
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

	public function hasTitle() {
		return (bool) $this->title;
	}

	public function createUiComponent(HtmlView $view) {
		return $view->getImport('\qsci\view\image.html', array('image' => $this));
	}

}