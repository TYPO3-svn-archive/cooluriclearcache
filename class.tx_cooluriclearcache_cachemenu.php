<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Raphael Zschorsch (rafu1987@gmail.com) <rafu1987@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_typo3.'interfaces/interface.backend_cacheActionsHook.php');
require_once(t3lib_extMgm::extPath('cooluriclearcache').'class.tx_cooluriclearcache.php');

class tx_cooluriclearcache_cachemenu implements backend_cacheActionsHook {

	public function manipulateCacheActions(&$a_cacheActions, &$a_optionValues) {
		if(($GLOBALS['BE_USER']->isAdmin() || $GLOBALS['BE_USER']->getTSConfigVal('options.clearCache.cooluri')) && $GLOBALS['TYPO3_CONF_VARS']['EXT']['extCache']) {
			$s_title = $GLOBALS['LANG']->sL('LLL:EXT:cooluriclearcache/locallang.xml:rm.clearCacheMenu_cooluriClearCache', true);
			$s_imagePath = t3lib_extMgm::extRelPath('cooluriclearcache');
			//if(strpos($s_imagePath,'typo3conf') !== false) $s_imagePath = '../'.$s_imagePath;
			$a_cacheActions[] = array(
				'id'    => 'cooluricache',
				'title' => $s_title,
				'href' => 'ajax.php?ajaxID=tx_cooluriclearcache::clear',
				'icon'  => '<img src="'.$s_imagePath.'be_icon.gif" title="'.$s_title.'" alt="'.$s_title.'" />',
			);
		}
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cooluriclearcache/class.tx_cooluriclearcache_cachemenu.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cooluriclearcache/class.tx_cooluriclearcache_cachemenu.php']);
}

?>