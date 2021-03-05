<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Setting_Model extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}
	
	
	public function getall() 
	{
		$sql = "SELECT * FROM settings_tbl";
		$val = $this->db->query($sql);
		if($val->num_rows() > 0) 
		{
			return $val->result_array();
		}	
		
	}
	
    public function update($data)
	{
		
		$data = array(
		array(
		'id' => '1' ,
		'name' => 'email' ,
		'value' => $data['email']
		),
		array(
		'id' => '2' ,
		'name' => 'phone',
		'value' => $data['phone']
		),
		array(
		'id' => '3' ,
		'name' => 'facebook' ,
		'value' => $data['facebook']
		),
		array(
		'id' => '4' ,
		'name' => 'linkedin',
		'value' => $data['linkedin']
		),
		array(
		'id' => '5' ,
		'name' => 'twitter' ,
		'value' => $data['twitter']
		),
		array(
		'id' => '6' ,
		'name' => 'address',
		'value' => $data['address']
		),
		
		array(
		'id' => '11' ,
		'name' => 'site_name',
		'value' => $data['site_name']
		),
		array(
		'id' => '7' ,
		'name' => 'google',
		'value' => $data['google']
		),


        array(
		'id' => '8' ,
		'name' => 'instagram',
		'value' => $data['instagram']
		),


       array(
		'id' => '18' ,
		'name' => 'skype',
		'value' => $data['skype']
		),
		array(
		'id' => '13' ,
		'name' => 'map',
		'value' => $data['map']
		),
		array(
		'id' => '19' ,
		'name' => 'pinterest',
		'value' => $data['pinterest']
		),
        array(
		'id' => '15' ,
		'name' => 'timing1',
		'value' => $data['timing1']
		),	
		/*array(
		'id' => '14' ,
		'name' => 'mobile_no',
		'value' => $data['mobile_no']
		)*/
		array(
		'id' => '15' ,
		'name' => 'timing1',
		'value' => $data['timing1']
		),
		array(
		'id' => '16' ,
		'name' => 'timing2',
		'value' => $data['timing2']
		),
		array(
		'id' => '17' ,
		'name' => 'timing3',
		'value' => $data['timing3']
		),
		
		
		array(
		'id' => '14' ,
		'name' => 'mobile_no',
		'value' => $data['mobile_no']
		),
		array(
		'id' => '20',
		'name' => 'location',
		'value' => $data['location']
		),
		
		array(
		'id' => '21',
		'name' => 'opening_hours',
		'value' => $data['opening_hours']
		),

		
		
		array(
		'id' => '22',
		'name' => 'happy_hours',
		'value' => $data['happy_hours']
		),
		
        array(
		'id' => '23',
		'name' => 'twitter_wiget',
		'value' => $data['twitter_wiget']
		),
		array(
		'id' => '14' ,
		'name' => 'mobile_no',
		'value' => $data['mobile_no']
		)
		);

          
		  if( $this->db->update_batch('settings_tbl', $data, 'id'))
		{
			$data['success']="Setting updated Successfully";
			return  $data;
		}
		
		
	}	
	
	
	
	
}	
?>