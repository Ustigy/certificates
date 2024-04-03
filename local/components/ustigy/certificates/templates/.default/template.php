<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$certificate_rows = '';

	// Список сертификатов
	foreach ($arResult['CERTIFICATES_INFO'] as $certificate_info) {
		$date_active_to = $certificate_info[0];
		$certificate_number = $certificate_info[1];

		$certificate_rows .= 
		"<tr>
			<td>$certificate_number</td>
			<td>$date_active_to</td>
		</tr>";
	}
	if($certificate_rows === '') {
		$certificate_rows .= 
		"<tr>
			<td>---</td>
			<td>---</td>
		</tr>";
	}

?>


<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/certificates.css');?>

<section class="certificates">
	<div class="certificates_add">
		<form name="add_certificate" action="#" method="POST" enctype="multipart/form-data">
			<label for="CERTIFICATE_NUMBER">
				Активировать сертификат
			</label>
			<input type="text" name="CERTIFICATE_NUMBER" maxlength="255" value="Номер сертификата" onfocus="this.value=''" class="certificates_add_input">
			<input type="submit" value="Активировать" class="certificates_add_btn">
		</form>

		<?php 
			$session = \Bitrix\Main\Application::getInstance()->getSession();
		
			if($session['status_activation'] == 'success') {
				echo 
				'<p class="status_activation status_activation_success">
					Сертификат успешно активирован
				</p>';
			} else if($session['status_activation'] == 'fail_number_does_not_exist') {
				echo 
				'<p class="status_activation status_activation_fail">
					Не удалось активировать сертификат. <br> Проверьте номер сертификата
				</p>';
				
			} else if($session['status_activation'] == 'fail_number_already_activated') {
				echo 
				'<p class="status_activation status_activation_fail">
					Не удалось активировать сертификат. <br> Сертификат был активирован ранее
				</p>';
			}
			$session['status_activation'] = '';

		?>


	</div>

	<div class="certificates_info">
		<table>
			<caption>Активированные сертификаты</caption>
			<thead>
				<tr>
					<th>Номер сертификата</th>
					<th>Дата активации</th>
				</tr>
			</thead>
			<tbody>
				<?= $certificate_rows ?>
			</tbody>
		</table>
	</div>

</section>

