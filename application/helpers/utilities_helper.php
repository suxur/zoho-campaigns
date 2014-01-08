<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('states'))
{
	function states($selected)
	{
		$string = '';
		$states_arr = array(
		    'AL' => "Alabama",
		    'AK' => "Alaska",
		    'AZ' => "Arizona",
		    'AR' => "Arkansas",
		    'CA' => "California",
		    'CO' => "Colorado",
			'CT' => "Connecticut",
			'DE' => "Delaware",
			'DC' => "District Of Columbia",
			'FL' => "Florida",
			'GA' => "Georgia",
			'HI' => "Hawaii",
			'ID' => "Idaho",
			'IL' => "Illinois",
			'IN' => "Indiana",
			'IA' => "Iowa", 
			'KS' => "Kansas",
			'KY' => "Kentucky",
			'LA' => "Louisiana",
			'ME' => "Maine",
			'MD' => "Maryland",
			'MA' => "Massachusetts",
			'MI' => "Michigan",
			'MN' => "Minnesota",
			'MS' => "Mississippi",
			'MO' => "Missouri",
			'MT' => "Montana",
			'NE' => "Nebraska",
			'NV' => "Nevada",
			'NH' => "New Hampshire",
			'NJ' => "New Jersey",
			'NM' => "New Mexico",
			'NY' => "New York",
			'NC' => "North Carolina",
			'ND' => "North Dakota",
			'OH' => "Ohio",
			'OK' => "Oklahoma",
			'OR' => "Oregon",
			'PA' => "Pennsylvania",
			'RI' => "Rhode Island",
			'SC' => "South Carolina",
			'SD' => "South Dakota",
			'TN' => "Tennessee",
			'TX' => "Texas",
			'UT' => "Utah",
			'VT' => "Vermont",
			'VA' => "Virginia",
			'WA' => "Washington",
			'WV' => "West Virginia",
			'WI' => "Wisconsin",
			'WY' => "Wyoming"
		);
		foreach($states_arr as $k => $v)
		{
			if ($selected == $k)
			{
				$string .= '<option value="'.$k.'" selected>'.$v.'</option>'."\n";
			}
			else
			{
				$string .= '<option value="'.$k.'">'.$v.'</option>'."\n";
			}
		}

		return $string;
	}
}

// ---------------------------------------------------------------------------------------------------------------------

/**
 * If Isset
 *
 * This method checks if the variable passed isset and then either
 * returns the variable or a default value
 *
 * @param  $var
 * @param  $default
 * @return string
 * @author Joshua Payne
 **/
if ( ! function_exists('if_set'))
{
    function if_set(&$var, $default = null, $echo = TRUE)
    {
        $output = isset($var) ? $var : $default;

        if ($echo == TRUE)
        {
            echo $output;
        }
        else
        {
            return $output;
        }
    }
}

// ---------------------------------------------------------------------------------------------------------------------

if ( ! function_exists('strip_comma'))
{
	function strip_comma($str)
	{
		$str = str_replace(',', '', $str);
		return $str;
	}
}

// ---------------------------------------------------------------------------------------------------------------------

/**
 * Dump helper. Functions to dump variables to the screen, in a nicely formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if ( ! function_exists('dump'))
{
	function dump ($var, $label = 'Dump', $echo = TRUE)
	{
		// Store dump in variable 
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		
		// Add formatting
		$output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
		$output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
		
		// Output
		if ($echo == TRUE) {
			echo $output;
		}
		else {
			return $output;
		}
	}
}

// ---------------------------------------------------------------------------------------------------------------------

if ( ! function_exists('dump_exit'))
{
	function dump_exit($var, $label = 'Dump', $echo = TRUE)

	{
		dump ($var, $label, $echo);
		exit;
	}
}