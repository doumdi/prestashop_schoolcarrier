<?php

class SchoolCarrierDisplayCarrierListController
{
	public function __construct($module, $file, $path)
	{
		$this->file = $file;
		$this->module = $module;
		$this->context = Context::getContext();
		$this->_path = $path;
	}

	public function run($params)
	{
        if ((int) ($params['cart']->id_carrier) == (int)(Configuration::get('SCHOOL_CARRIER_ID')))
        {
			$teachers = array(
				"1re DUBÉ, CHANTAL",
				"1re GILBERT, MARYLÈNE",
				"1re LEFEBVRE, ANNE-MARIE",
				"1re MORIN, MARIANNE",
				"2e FREDETTE, CAROLINE",
				"2e LETARTE, NATHALIE",
				"2e MACKIE, CAROLINE",
				"3e CABANA, MARTINE",
				"3e CARON, DANIELLE",
				"3e LEDUC, STÉPHANIE",
				"4e ADAM, LUCIE",
				"4e CAVANAGH, CHANTAL",
				"4e GAULIN-LEDUC, MARIE-EVE",
				"5e BOLDUC, SONIA",
				"5e JOLICOEUR, INGRID",
				"5e PATRY, JULIE",
				"6e BONNEVILLE CHANTAL",
				"6e BRUNEAU, MARIE-EVE",
				"6e LEMAIRE, MARILYNE");

			//$this->context->controller->addJS($this->_path.'views/js/mymodcarrier.js');

			//$ajax_link = $this->context->link->getModuleLink('mymodcarrier', 'relaypoint', array('controller' => 'relaypoint'));
			//$this->context->smarty->assign('mymodcarrier_ajax_link', $ajax_link);
			//$this->context->smarty->assign('id_carrier_relay_point', Configuration::get('MYMOD_CA_REPO'));
			$this->context->smarty->assign('teachers', $teachers);

			return $this->module->display($this->file, 'displayCarrierList.tpl');
		}
	}
}