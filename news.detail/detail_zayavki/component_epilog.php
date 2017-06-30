<?
if (!empty($_REQUEST['component_message']) AND $_REQUEST['component_message'] == 'comments_tree' AND check_bitrix_sessid()) {
	$arUserGroup = GetUserGroupType($USER->GetID());
	$error = '';

	/* @TODO: Запрет на комментарование не автором заявки */
	if ($USER->isAuthorized()) {
		$arProps = [
			'ELEMENT_ID' => htmlentities(trim(strip_tags($_REQUEST['element_id']))),
			'COMMENT_ID' => htmlentities(trim(strip_tags($_REQUEST['comment_id']))),
			'TYPE' => $arUserGroup['CODE'],
		];

		$arFields = [
			'PREVIEW_TEXT' => htmlentities(trim(strip_tags($_REQUEST['comment']))),
			'ACTIVE' => 'N',
			'IBLOCK_ID' => IBLOCK_COMMENTS,
			'PROPERTY_VALUES' => $arProps,
			'NAME' => 'Комментарий'
		];

		CModule::IncludeModule('iblock');
		$IBE = new CIBlockElement;
		$CommentID = $IBE->Add($arFields);

		if (!$CommentID)
			$error = $IBE->LAST_ERROR;
	}

	/* @TODO: Send email to moderator */
	ob_start();
?>

<script>
	$(function() {
		var error = <?= json_encode(!empty($error)); ?>;
		if (error) {
			swal('Добавление комментария', <?= json_encode($error) ?>, 'error');
		} else {
			swal('Добавление комментария', 'Комментарий отправлен на модерацию', 'success');
			var comment_id = '#comment_'+<?= json_encode($CommentID) ?>;
			/*
			$('body, html')
				.stop()
				.animate({
					scrollTop: $(comment_id).offset().top - 40
				});

			$(comment_id).addClass('comment_hightlight');
			*/
		}
	});
</script>

<?
	AddFooterScript(ob_get_contents());
	ob_end_clean();
} //end top 'if';