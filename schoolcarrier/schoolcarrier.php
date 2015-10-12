<?php

/*
** http://doc.prestashop.com/display/PS14/Carrier+modules+-+functions,+creation+and+configuration
*/


if (!defined('_PS_VERSION_'))
	exit;

class SchoolCarrier extends CarrierModule
{
	public  $id_carrier;
	private $_html = '';
	private $_postErrors = array();
	private $_moduleName = 'schoolcarrier';

	/*
	** Construct Method
	**
	*/

	public function __construct()
	{

      	// Variables common to all modules (no need to present them)
    	$this->name = 'schoolcarrier';
    	$this->tab = 'shipping_logistics';
    	$this->version = '1.0';
    	$this->author = 'Y. Laberge, D. Letourneau';
    	$this->limited_countries = array('ca', 'fr');
    	parent::__construct ();
   	    $this->displayName = $this->l('SchoolCarrier');
    	$this->description = $this->l('Delivery methods that you want');
    	 	
    	// If the module is installed, we run a few checks
    	if (self::isInstalled($this->name))
    	{
        	// We retrieve the list of carrier ids
        	global $cookie;
        	$carriers = Carrier::getCarriers($cookie->id_lang, true, false, false,
                NULL, PS_CARRIERS_AND_CARRIER_MODULES_NEED_RANGE);
        
        	$id_carrier_list = array();
        	foreach($carriers as $carrier)
            	$id_carrier_list[] .= $carrier['id_carrier'];
 
 
 
 
        	// We look to see if the carriers have been created for the module
        	// And if any additional fees have been configured
        	// These warnings will appear on the page where the modules are listed
        	$warning = array();
        	
        	if (!in_array((int)(Configuration::get('SCHOOL_CARRIER_ID')),
                $id_carrier_list)) $warning[] .= $this->l('"Carrier 1"').' ';
   
 

        
        	if (count($warning))
    			$this->warning .= implode(' , ',$warning).$this->l('must be configured');
    	}
    	
    	
    
	}

/*
** Install / Uninstall Methods
**
*/
public function install()
{
    // We create a table containing information on the carriers
    // that we want to create
 
    $carrierConfig = array(
    0 => array('name' => 'Carrier1',
      'id_tax_rules_group' => 0, // We do not apply thecarriers tax
      'active' => true, 
      'deleted' => 0,
      'shipping_handling' => false,
      'range_behavior' => 0,
      'delay' => array(
        'fr' => 'Description 1',
        'en' => 'Description 1',
        Language::getIsoById(Configuration::get
                ('PS_LANG_DEFAULT')) => 'Description 1'),
      'id_zone' => 1, // Area where the carrier operates
      'is_module' => true, // We specify that it is a module
      'shipping_external' => true,
      'external_module_name' => 'schoolcarrier', // We specify the name of the module
      'need_range' => true // We specify that we want the calculations for the ranges
    // that are configured in the back office
      ),

	);
	
    // We create the two carriers and retrieve the carrier ids
    // And save the ids in a database
    // Feel free to take a look at the code to see how installExternalCarrier works
    // However you should not normally need to modify this function
 
    $id_carrier1 = $this->installExternalCarrier($carrierConfig[0]);

    Configuration::updateValue('SCHOOL_CARRIER_ID', (int)$id_carrier1);

    // Then proceed with a standard module install
    // Later we will take a look at the purpose of theupdatecarrier hook
    if (!parent::install() ||
        !$this->registerHook('updateCarrier'))
        return false;
 
    return true;
}


	public function uninstall()
	{
   		// We first carry out a classic uninstall of a module
    	if (!parent::uninstall() ||
        	!$this->unregisterHook('updateCarrier'))
        	return false;  
        
             
    	// We delete the carriers we created earlier
    	$Carrier1 = new Carrier((int)(Configuration::get('SCHOOL_CARRIER_ID')));
   
		//we choose another
   		if (Configuration::get('PS_CARRIER_DEFAULT') == (int)($Carrier1->id))
    	{
        	global $cookie;
        	$carriersD = Carrier::getCarriers($cookie->id_lang, true, false, false,
                	NULL, PS_CARRIERS_AND_CARRIER_MODULES_NEED_RANGE);
                	
        	foreach($carriersD as $carrierD)
            	if ($carrierD['active'] AND !$carrierD['deleted']
                	AND ($carrierD['name'] != $this->_config['name']))
                	Configuration::updateValue('PS_CARRIER_DEFAULT',
                                $carrierD['id_carrier']);
    	}
    	
    	// Then we delete the carriers using variable delete
    	// in order to keep the carrier history for orders placed with them
 
    	$Carrier1->deleted = 1;
  
    	if (!$Carrier1->update())
        	return false;
 
    	return true;;
	}



	/*
	** Hook update carrier
	**
	*/
	public function hookupdateCarrier($params)
	{
    	// Update the id for carrier 1
    	if ((int)($params['id_carrier']) == (int)(Configuration::get('SCHOOL_CARRIER_ID')))
        	Configuration::updateValue('SCHOOL_CARRIER_ID', (int)($params['carrier']->id));
	}



/*
** Front Methods
**
** If you set the variable need_range to true when you created your carrier
** in the install() method, the method called up by the Cart class
** will be getOrderShippingCost()
** Otherwise the method called up will be getOrderShippingCostExternal
**
** The $params variable contains the basket, the customer and their addresses
** The $shipping_cost variable contains the cost calculated
** according to the price ranges set
** for the carrier in the backoffice
**
*/
 
public function getOrderShippingCost($params, $shipping_cost)
{
    // This example returns the shipping fee with the additional cost
    // but you can call up a webservice or perform the calculation you want
    // before returning the final shipping fee
 
 	//Free!!!
    if ($this->id_carrier == (int)(Configuration::get('SCHOOL_CARRIER_ID')))
        return (float)(0.0);
 

    return false;
}

public function getOrderShippingCostExternal($params)
{
    // This example returns the additional cost
    // but you can call up a webservice or perform the calculation you want
    // before returning the final shipping fee
 
 	//Free!!!
    if ($this->id_carrier == (int)(Configuration::get('SCHOOL_CARRIER_ID')))
    	return (float)(0.0);

    // If the carrier is not recognised, just return false
    // and the carrier will not appear in the carrier list
 
    return false;
}

} //class SchoolCarrier


?>
