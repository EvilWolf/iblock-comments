<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>
<div class="order-post">
	<ul class="list-unstyled order-post--props">
		<li class="order-post--props--item">
			<strong>Номер заявки:</strong> <?= $arResult['ID'] ?>
		</li>
		<li class="order-post--props--item">
			<strong>Дата:</strong> <?= CIBlockFormatProperties::DateFormat("f j, Y H:i:s", MakeTimeStamp($arResult["TIMESTAMP_X"], CSite::GetDateFormat())); ?>
		</li>
		<li class="order-post--props--item">
			<strong>Предложение должника:</strong> <?= $arResult['PROPERTIES']['LAWYER_REW']['VALUE'] ?>
		</li>
		<li class="order-post--props--item">
			<strong>Регион:</strong> <?= $arResult['PROPERTIES']['REGION']['VALUE'] ?>
		</li>
		<li class="order-post--props--item">
			<strong>Сумма долга:</strong> <?= $arResult['PROPERTIES']['CREDIT_SUMM']['VALUE'] ?>
		</li>
	</ul>

	<strong>Дополнительная иформация:</strong>
	<div class="order-post--text">
		<?= $arResult['PREVIEW_TEXT'] ?>
	</div>

	<br>
	<div class="order-post--props">
		<ul class="list-unstyled order-post--props">
			<li class="order-post--props--item">
				<strong>Статус:</strong> <?= $arResult['PROPERTIES']['SEARCH_STATUS']['VALUE'] ?>
			</li>
		</ul>
	</div>
</div>