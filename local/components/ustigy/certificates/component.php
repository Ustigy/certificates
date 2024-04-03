<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Вывод сертификатов, активированных текущим пользователем
CModule::IncludeModule('iblock');
$IBLOCK_ID = 4;
$iblock = \Bitrix\Iblock\Iblock::wakeUp($IBLOCK_ID);

$arSelect = Array("ID", "NAME", "DATE_ACTIVE_TO");
$arFilter = Array("IBLOCK_ID" => IntVal($IBLOCK_ID), "MODIFIED_USER_ID" => $USER->GetID(), "ACTIVE" => "N");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
$VALUES = [];
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();

    $VALUES[$arFields['ID']] = $arFields['DATE_ACTIVE_TO'];

    $res1 = CIBlockElement::GetProperty($IBLOCK_ID, $arFields['ID']);
    while ($ob1 = $res1->GetNext()) {
        if (!is_array($VALUES[$arFields['ID']])) {
            $VALUES[$arFields['ID']] = [$VALUES[$arFields['ID']]];
        }
        $VALUES[$arFields['ID']][] = $ob1['VALUE'];
    }
}
$arResult['CERTIFICATES_INFO'] = $VALUES;


//Активация сертификата
$session = \Bitrix\Main\Application::getInstance()->getSession();
if (!empty($_REQUEST['CERTIFICATE_NUMBER'])) {
	$status_activation = null;

	CModule::IncludeModule('iblock');
	$IBLOCK_ID = 4;
	$iblock = \Bitrix\Iblock\Iblock::wakeUp($IBLOCK_ID);
	$element = $iblock->getEntityDataClass()::query()
		->where('CERTIFICATE_NUMBER.VALUE', $_POST['CERTIFICATE_NUMBER'])
		->fetchObject();
	if(isset($element['id'])) {
		$certificate_id = $element['id'];
		$already_activated = false;

		//Проверяем, что сертификат не был активирован ранее
		$arFilter = [
			'IBLOCK_ID' => $IBLOCK_ID,
			'ID' => $certificate_id
		];
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), []);
		while($ob = $res->GetNextElement()) {
			$arFields = $ob->GetFields();
		}
		if($arFields['ACTIVE'] == 'N') {
			$already_activated = true;
			$status_activation = 'fail_number_already_activated';
			$session->set('status_activation', $status_activation);
		}

		if(!$already_activated) {
			//Обновляем свойства сертификата
			$el = new CIBlockElement;
			$PROP = array(
				"CERTIFICATE_NUMBER" => $_REQUEST['CERTIFICATE_NUMBER']
			);
			$arLoadProductArray = Array(
				"MODIFIED_BY"    => $USER->GetID(),
				"PROPERTY_VALUES"=> $PROP,
				"ACTIVE"         => "N", 
				"DATE_ACTIVE_TO" => date('d.m.Y H:i:s')
			);
			$res = $el->Update($certificate_id, $arLoadProductArray);
			
			$status_activation = 'success';
		}

	} else {
		$status_activation = 'fail_number_does_not_exist';
	}

	if (!$session->has('status_activation')) {
		$session->set('status_activation', $status_activation);
	} else {
		$session['status_activation'] = $status_activation;
	}
	header("Location: /");
	exit();

}


$this->IncludeComponentTemplate();


?>