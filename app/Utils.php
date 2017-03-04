<?php
/**
 * busca-ativa-escolar-api
 * Utils.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 04/03/2017, 18:46
 */

namespace BuscaAtivaEscolar;


class Utils {

	public static function addURLParameter($in, $params) {

		if(strpos($in, "?") !== -1) {
			return $in . "?" . $params;
		}

		return $in . "&" . $params;

	}

	public static function clearPhoneNumber($phone) {
		return str_replace(['(',')',' ', '.', '-',','], '', $phone);
	}

	public static function clearUserHTML($in) {
		return strip_tags($in, '<p><b><u><i><a><img><center><span><div><strong><small><big><ul><li>');
	}

	public static function clearUserStyles($in) {
		return preg_replace('/(<[^>]*) style=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $in);
	}

	public static function clearSEODescription($in) {
		$out = strip_tags($in);
		$out = str_replace(["\r","\n","\t"], " ", $out);
		$out = str_replace("\"", "\\\"", $out);
		return $out;
	}

	public static function renderHighlightableText($text) {
		$text = preg_replace('#\*{2}(.*?)\*{2}#', '<strong>$1</strong>', $text);
		$text = preg_replace('#\-{2}(.*?)\-{2}#', '<em>$1</em>', $text);

		return $text;
	}

}