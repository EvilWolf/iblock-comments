<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/* Массив со ссылками на комментарии */
$arReplys = [];

/* @TODO: Обрабатывать начличие детей, рекурсивно, что бы сделать 'бесконечную' вложеность малой кровью */
if (!function_exists('comments_tree_get_comment')) {
	function comments_tree_get_comment(&$arItem, &$arReplys, &$that) {
		require 'comment_template.php';
	}
}

/* Количество элементов */
$arResult['COMMENTS_COUNT'] = 0;

/* Формирует массив связей между комментариями */
foreach ($arResult['ITEMS'] as $key => $arItem) {
	$arResult['COMMENTS_COUNT']++;

	/* Установлен ID родительского комментария */
	$parentID = $arItem['PROPERTIES']['COMMENT_ID']['VALUE'];
	if (!empty($parentID)) {
		if (!is_array($arReplys[$parentID]))
			$arReplys[$parentID] = [];
		$arReplys[$parentID][] = $arItem;
		unset($arResult['ITEMS'][$key]);
	}
}

/* Сохраняем всё в кеш. */
$cp = $this->__component; // объект компонента
if (is_object($cp)) {
	$arResult['REPLYS'] = $arReplys;
	$cp->arResult['REPLYS'] = $arReplys;
	$cp->SetResultCacheKeys(array('REPLYS', 'COMMENTS_COUNT'));
}