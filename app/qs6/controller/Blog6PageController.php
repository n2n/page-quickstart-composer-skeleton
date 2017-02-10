<?php

namespace qs6\controller;

use page\bo\PageController;
use n2n\reflection\annotation\AnnoInit;
use page\annotation\AnnoPage;
use n2n\persistence\orm\annotation\AnnoManyToOne;
use qs6\bo\BlogCategory;

class Blog6PageController extends PageController {
	private static function _annos(AnnoInit $ai) {
		$ai->m('blog', new AnnoPage());
		$ai->p('category', new AnnoManyToOne(BlogCategory::getClass()));
	}
	
	private $category;
	
	public function getCategory() {
		return $this->category;
	}
	
	public function setCategory(BlogCategory $category = null) {
		$this->category = $category;
	}
	
	public function blog(BlogController $blogController, array $delegateCmds = null) {
		$blogController->setCategory($this->category);
		$this->delegate($blogController);
	}
}

