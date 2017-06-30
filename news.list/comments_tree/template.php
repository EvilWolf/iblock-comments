<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
$arReplys = $arResult['REPLYS'];
?>

<div class="post-block post-comments clearfix">
	<h3 class="heading-primary"><i class="fa fa-comments"></i>Комментарии (<?= $arResult["COMMENTS_COUNT"] ?>)</h3>
	<ul class="comments">
	<? foreach($arResult["ITEMS"] as $arItem): ?>
		<li>
			<? /* Комментарий 1 уровня */ ?>
			<? comments_tree_get_comment($arItem, $arReplys, $this) ?>

			<? /* Ответ на комментарий. 2 уровень, @TODO можно переделать в мультилевел в result_modifier.php */ ?>
			<? if (!empty($arReplys[$arItem['ID']])): ?>
			<ul class="comments reply">
				<? foreach ($arReplys[$arItem['ID']] as $arReply): ?>
					<li><? comments_tree_get_comment($arReply, $arReplys, $this) ?></li>
				<? endforeach; ?>
			</ul>
			<? endif; ?>
		</li>
	<? endforeach; ?>
	</ul>
</div>