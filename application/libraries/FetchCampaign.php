<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FetchCampaign {

	const SCOPE 	= "crmapi";
	const AUTHTOKEN = "a20cd80e5f5e593fdada4b72476a9ff1";
	const TARGETURL = "https://crm.zoho.com/crm/private/xml/Campaigns/getSearchRecords";

	private $id;

	function __construct($params)
	{
		$this->id = $params['campaign'];
	}

	function fetch()
	{
		$parameter = "";
		$parameter = $this->setParameter("scope", self::SCOPE, $parameter);
		$parameter = $this->setParameter("authtoken", self::AUTHTOKEN, $parameter);
		$parameter = $this->setParameter("selectColumns", "Campaigns(CAMPAIGNID,Campaign Name,Status,Campaign ID,Coop Percentage)", $parameter);
		$parameter = $this->setParameter("searchCondition", "(Campaign ID|=|" . $this->id .")", $parameter);

		$response 	= $this->sendCurlRequest(self::TARGETURL, $parameter);
		$xml 		= $this->parseXML($response);

		return $xml;		
	}

	private function setParameter($key, $value, $parameter)
	{
		if ($parameter === "" || strlen($parameter) == 0)
		{
			$parameter = $key . '=' . $value;
		}
		else
		{
			$parameter .= '&' . $key . '=' . $value;
		}
		
		return $parameter;
	}

	private function parseXML($xmlString)
	{
		$xml = simplexml_load_string($xmlString);
		if (isset($xml->result))
		{
			return $xml;
		}
		else if (isset($xml->error))
		{
			echo "Error code: " . $xml->error->code . "<br/>";
			echo "Error message: " . $xml->error->message;
		}
	}

	private function sendCurlRequest($url, $parameter)
	{
		try
		{
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter);

            $result = curl_exec($ch);

            curl_close($ch);

            return $result;
		}
		catch (Exception $exception)
		{
			echo 'Exception Message: ' . $exception->getMessage() . '<br/>';
			echo 'Exception Trace: ' . $exception->getTraceAsString();
		}
	}
}

/* End of file FetchCampaign.php */
/* Location: ./application/libraries/FetchCampaign.php */