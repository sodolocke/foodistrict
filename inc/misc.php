<?php
if ( ! function_exists( 'html' ) ):
function html($tag, $attributes = array(), $content = '') {
	if ( is_array( $attributes ) ) {
		$closing = $tag;
		foreach ( $attributes as $key => $value ) {
			$tag .= ' ' . $key . '="' . esc_attr( $value ) . '"';
		}
	} else {
		$content = $attributes;
		list($closing) = explode(' ', $tag, 2);
	}

	return "<{$tag}>{$content}</{$closing}>";
}
endif;

//SOAP
function getStaff($str){
	if ($str){
		$html = "";
		$xml = simplexml_load_file("http://apollo.kmutt.ac.th/peopledirectory/search.asmx/GetPeople?strKey=peRGgujknZ59LDwTScJP&strLanguage=EN&strKeyword=$str");
		$data = json_decode($xml);
		foreach($data as $entry){
			$name = html("div", array("class" => "name"), $entry->TITLE." ".$entry->FIRSTNAME." ".$entry->LASTNAME);
			$position = array();
			if ($entry->DEPARTMENTLEVEL2) array_push($position, $entry->DEPARTMENTLEVEL2);
			if ($entry->DEPARTMENTLEVEL3) array_push($position, $entry->DEPARTMENTLEVEL3);
			$position = html("div", array("class" => "position"), implode(',', $position));
			$tel = html("div", array("class" => "tel"), $entry->TELEPHONE);
			$email = html("a", array("href" => "mailto:".$entry->EMAIL), $entry->EMAIL);
			$html .= html("div", array(
				"class" => "staff-result"
			), $name.$position.$tel.$email);
		}
		return $html;
	}
}
function getStaffByLetter($letter){
	if ($letter){
		$html = "";
		$xml = simplexml_load_file("http://apollo.kmutt.ac.th/peopledirectory/search.asmx/GetPeopleByFirstCharacter?strKey=peRGgujknZ59LDwTScJP&strLanguage=EN&strKeyword=$letter");
		$data = json_decode($xml);
		foreach($data as $entry){
			$name = html("div", array("class" => "name"), $entry->TITLE." ".$entry->FIRSTNAME." ".$entry->LASTNAME);
			$position = array();
			if ($entry->DEPARTMENTLEVEL2) array_push($position, $entry->DEPARTMENTLEVEL2);
			if ($entry->DEPARTMENTLEVEL3) array_push($position, $entry->DEPARTMENTLEVEL3);
			$position = html("div", array("class" => "position"), implode(',', $position));
			$tel = html("div", array("class" => "tel"), "Tel. ".$entry->TELEPHONE);
			$email = html("a", array("href" => "mailto:".$entry->EMAIL), $entry->EMAIL);
			$html .= html("div", array(
				"class" => "staff-result"
			), $name.$position.$tel.$email);
		}
		return $html;
	}
}
function getStaffByPosition($str, $ftype){
	if ($str){
		$html = "";
		$xml = simplexml_load_file("http://apollo.kmutt.ac.th/peopledirectory/search.asmx/GetPeopleByPosition?strKey=peRGgujknZ59LDwTScJP&strLanguage=EN&strPosition=$ftype&strKeyword=$str");
		$data = json_decode($xml);
		foreach($data as $entry){
			$name = html("div", array("class" => "name"), $entry->TITLE." ".$entry->FIRSTNAME." ".$entry->LASTNAME);
			$position = array();
			if ($entry->DEPARTMENTLEVEL2) array_push($position, $entry->DEPARTMENTLEVEL2);
			if ($entry->DEPARTMENTLEVEL3) array_push($position, $entry->DEPARTMENTLEVEL3);
			$position = html("div", array("class" => "position"), implode(',', $position));
			$tel = html("div", array("class" => "tel"), $entry->TELEPHONE);
			$email = html("a", array("href" => "mailto:".$entry->EMAIL), $entry->EMAIL);
			$html .= html("div", array(
				"class" => "staff-result"
			), $name.$position.$tel.$email);
		}
		return $html;
	}
}


