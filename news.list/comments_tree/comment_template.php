<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<? $that->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); $that->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>

<div class="comment" id="<?=$that->GetEditAreaId($arItem['ID']);?>">
	<div class="comment-block" id="comment_<?= $arItem['ID'] ?>">
		<!-- <div class="comment-arrow"></div> -->
		<span class="comment-by"> <strong>Управляющий (<?= $arItem['ID'] ?>)</strong> <span class="pull-right"> <span> <a href="#" class="reply-to-comment" data-reply-to="<?= $arItem['ID'] ?>"><i class="fa fa-reply"></i> Ответить</a></span> </span> </span>
		<p><?= $arItem['PREVIEW_TEXT'] ?></p>
		<? if ($arItem['PROPERTIES']['COMMENT_ID']['VALUE']): ?>
			<p>Ответ на <?= $arItem['PROPERTIES']['COMMENT_ID']['VALUE'] ?></p>
		<? endif; ?>
		<span class="date pull-right"><?= CIBlockFormatProperties::DateFormat("f j, Y H:i:s", MakeTimeStamp($arItem["TIMESTAMP_X"], CSite::GetDateFormat())); ?></span>
	</div>
</div>