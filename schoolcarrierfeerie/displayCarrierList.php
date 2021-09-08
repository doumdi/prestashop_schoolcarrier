<?php

class SchoolCarrierFeerieDisplayCarrierListController
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
	    $this->context->smarty->assign('schoolcarrier_feerie_carrier_id', (int)(Configuration::get('SCHOOL_CARRIER_FEERIE_ID')));
        return $this->module->display($this->file, 'displayCarrierList.tpl');
	}
}

?>