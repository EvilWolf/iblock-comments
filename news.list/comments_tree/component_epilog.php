<?

$filterName = $arParams['FILTER_NAME'];
$arFilter = $GLOBALS[$filterName];
$element_id = intval($arFilter['PROPERTY_ELEMENT_ID']);
?>
<div class="post-block post-leave-comment" id="comment_form">
	<h3 class="heading-primary">Оставить комментарий</h3>
	<form action="" method="POST">
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<label>Комментарий</label> <label class="form-replyto" style="display: none;" title="Отменить ответ"> в ответ <b></b> </label>
					<textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" name="comment_id" value="">
				<input type="hidden" name="element_id" value="<?= $element_id ?>">
				<?= bitrix_sessid_post() ?>
				<input type="hidden" name="component_message" value="comments_tree">
				<input type="submit" value="Отправить сообщение" class="btn btn-primary btn-lg" data-loading-text="Отправка ...">
			</div>
		</div>
	</form>
</div>