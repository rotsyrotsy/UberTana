<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('getAsset'))
{
	/**
	 * Get "now" time
	 *
	 * Returns time() based on the timezone parameter or on the
	 * "time_reference" setting
	 *
	 * @param	string
	 * @return	int
	 */
	function getAsset($name = NULL)
	{
		return site_url().'assets/'.$name;
	}

    function getImage($name)
	{
		return getAsset('img/').$name;
	}

    function getCss($name)
	{
		return getAsset('css/').$name;
	}

    function getJs($name)
	{
		return getAsset('js/').$name;
	}

	function getLib($name)
	{
		return getAsset('lib/').$name;
	}
	function getVendors($name)
	{
		return getAsset('vendors/').$name;
	}
}

?>