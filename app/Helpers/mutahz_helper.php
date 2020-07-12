<?php 
/**
 * 
 * @author Muhammad Taufiq Hidayat
 * @link https://github.com/presidendjakarta
 *
 * @package CodeIgniter Mutahz
 * @subpackage Codeigniter Helper
 * @since Lahir
 */
if (!function_exists('size_convert_2')) {
	function size_convert_2($size,$precision = 2){
		$base = log($size, 1024);
	    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   

	    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
	}
}
if (!function_exists('size_convert')) {
	function size_convert($size,$precision = 2){
		$base = log($size, 1000);
	    $suffixes = array('', 'Kb', 'Mb', 'Gb', 'Tb');   

	    return round(pow(1000, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
	}
}

if (!function_exists('array_print')) {
	function array_print($array_data='')
	{
		return print("<pre>".print_r($array_data,true)."</pre>");
	}
}
if (!function_exists('array_where')) {
	function array_where($array_data='',$column='',$value='')
	{
		return  array_search($value, array_column($array_data, $column));
	}
}

if (!function_exists('array_wheres')) {
	function array_wheres($array_data='',$column='',$value='')
	{
		$new_key = array_search($value, array_column($array_data, $column));
		if ($array_data[$new_key][$column]!=$value) {
			return false;
		}else{
			return $array_data[$new_key];
		}
	}
}



if ( ! function_exists('anti_xss'))
{
	/**
	 * anti_xss
	 *
	 * 
	 *
	 * @param	string
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function anti_xss($data)
	{
		// Fix &entity\n;
	$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

	// Remove semua attribute starting with "on" or xmlns
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

	// Remove javascript: and vbscript: protocols
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

	// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

	// Remove namespaced elements (we do not need them)
	$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

	do
	{
	    // Remove really unwanted tags
	    $old_data = $data;
	    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
	}
	while ($old_data !== $data);

	// we are done...
	return $data;
	}

}
if ( ! function_exists('_clean'))
{
	/**
	 * clean text to string
	 *
	 * @param	string	the URI segments of the form destination
	 * @param	array	a key/value pair of attributes
	 * @param	array	a key/value pair hidden data
	 * @return	string
	 */
	 function _clean($x='')
	{
		return htmlentities($x, ENT_QUOTES, 'utf-8');
	}
}

if ( ! function_exists('get_js'))
{
	/**
	 * bikin js get
	 *
	 * @param	string	the URI segments of the form destination
	 * @param	array	a key/value pair of attributes
	 * @param	array	a key/value pair hidden data
	 * @return	string
	 */
	function get_js($x=array())
	{
		$a = '';
		for ($i=0; $i <count($x) ; $i++) {
			$a .= ' <script src="'.base_url($x[$i]).'" type="text/javascript"></script>
			';

		}
		return $a;
	}
}
if ( ! function_exists('get_css'))
{
	/**
	 * bikin css get
	 *
	 * @param	string	the URI segments of the form destination
	 * @param	array	a key/value pair of attributes
	 * @param	array	a key/value pair hidden data
	 * @return	string
	 */
	function get_css($x=array())
	{
		
		$a = '';
		for ($i=0; $i <count($x) ; $i++) {
			$a .= '<link rel="stylesheet" type="text/css" href="'.base_url($x[$i]).'">
			';

		}
		return $a;
	}
}
if ( ! function_exists('rupiah'))
{
	/**
	 * buat ngubah string ke format rupiah
	 *
	 * @param	string	the URI segments of the form destination
	 * @param	array	a key/value pair of attributes
	 * @param	array	a key/value pair hidden data
	 * @return	string
	 */
	function rupiah($nilai,$pecahan=0)
	{
		return "Rp. ".number_format($nilai, $pecahan, ',', '.');
	}
}

if ( ! function_exists('_enc'))
{
	/**
	 * buan encrypt
	 *
	 * @param	string	the URI segments of the form destination
	 * @param	array	a key/value pair of attributes
	 * @param	array	a key/value pair hidden data
	 * @return	string
	 */
	function _enc($nilai)
	{
		return md5(sha1(base64_encode($nilai)));
	}
}



