<?php

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

/**
 * Installer for the faq module
 *
 * @author Matthias Mullie <matthias@mullie.eu>
 */
class FaqInstaller extends ModuleInstaller
{
	/**
	 * Install the module
	 */
	public function install()
	{
		// load install.sql
		$this->importSQL(dirname(__FILE__) . '/data/install.sql');

		// add 'search' as a module
		$this->addModule('faq');

		// import locale
		$this->importLocale(dirname(__FILE__) . '/data/locale.xml');

		// module rights
		$this->setModuleRights(1, 'faq');

		// action rights
		$this->setActionRights(1, 'faq', 'index');
		$this->setActionRights(1, 'faq', 'add');
		$this->setActionRights(1, 'faq', 'edit');
		$this->setActionRights(1, 'faq', 'delete');
		$this->setActionRights(1, 'faq', 'sequence');
		$this->setActionRights(1, 'faq', 'categories');
		$this->setActionRights(1, 'faq', 'add_category');
		$this->setActionRights(1, 'faq', 'edit_category');
		$this->setActionRights(1, 'faq', 'delete_category');
		$this->setActionRights(1, 'faq', 'sequence_questions');

		// extras
		$this->insertExtra('faq', 'block', 'Faq', 'index', null, 'N', 9001);
		$this->insertExtra('faq', 'block', 'Category', 'category', null, 'N', 9002);

		// set navigation
		$navigationModulesId = $this->setNavigation(null, 'Modules');
		$navigationFaqId = $this->setNavigation($navigationModulesId, 'Faq');
		$this->setNavigation($navigationFaqId, 'Questions', 'faq/index', array('faq/add', 'faq/edit'));
		$this->setNavigation($navigationFaqId, 'Categories', 'faq/categories', array('faq/add_category', 'faq/edit_category'));
	}
}