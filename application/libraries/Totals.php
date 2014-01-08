<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Totals {

	function travelCost($data)
	{
		$total = ($data['plane_ticket_cost'] + ((strip_comma($data['est_vehicle_miles']) / 20) * 3.5) + $data['hotel_cost'] + (($data['num_employees'] * 40) * $data['days_on_road']) + $data['vehicle_cost']);

		return $total;
	}

	function seminarCost($data)
	{
		$total = ($data['catering_cost'] + $data['location_rental']);

		return $total;
	}

	function productCost($data)
	{
		$total = ($data['pe_sold'] * 1219) + ($data['self_cert_sold'] * 1219) + ($data['self_cert_containment_sold'] * 3546) + ($data['pe_containment_sold'] * 5260);
		
		return $total;
	}	

	function marketingCost($data)
	{
		$total = ((strip_comma($data['packets_and_pens']) * 2) + (strip_comma($data['fliers']) * 0.5) + $data['radio'] + $data['newspaper'] + ($data['direct_mail'] * 1.1) + (($data['automated_calls'] * 3) * 0.035));

		return $total;
	}

	function seminarExpense($data)
	{
		$plan_cost 	= $this->productCost($data);
		$total 		= $plan_cost + $data['seminar_total'] + $data['travel_total'] + $data['marketing_total'];
		
		return $total;
	}

	function seminarRevenue($data)
	{
		$pe_liner_price			= 2000;
		$self_cert_liner_price  = 1000;

		$totals = array(
			'spill_kit_amount'				=> $data['spill_kit_price'] * $data['spill_kits_sold'],
			'pe_amount'						=> $data['pe_price'] * $data['pe_sold'],
			'self_cert_amount'				=> $data['self_cert_price'] * $data['self_cert_sold'],
			'pe_containment_amount'			=> $data['pe_containment_price'] * $data['pe_containment_sold'],
			'self_cert_containment_amount'	=> $data['self_cert_containment_price'] * $data['self_cert_containment_sold'],
			'pe_liner_amount'				=> $pe_liner_price * $data['pe_liner_sold'],
			'self_cert_liner_amount'		=> $self_cert_liner_price * $data['self_cert_liner_sold'],
			'inspection_amount'				=> $data['inspection_price'] * $data['inspection_sold']
		);
		
		$total 			 = array_sum($totals);
		$totals['total'] = $total;

		return $totals;
	}

	function coopRevenue($data)
	{
		$total = ($data['pe_amount'] + $data['self_cert_amount']) * ($data['coop_commission'] / 100);

		return $total;
	}

	function salesRevenue($data)
	{
		$total = (($data['pe_amount'] + $data['self_cert_amount']) + ($data['pe_containment_amount'] + $data['self_cert_containment_amount'])) * 0.2;

		return $total;
	}
}

/* End of file Totals.php */
/* Location: ./application/libraries/Totals.php */