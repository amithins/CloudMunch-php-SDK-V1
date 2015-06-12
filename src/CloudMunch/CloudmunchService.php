<?php

namespace CloudMunch;
use CloudMunch\cmDataManager;
//require_once ("cmDataManager.php");
require_once ("AppErrorLogHandler.php");



/**
 * Class CloudmunchService
 * @package CloudMunch
 * @author Rosmi
 * This class provides the service methods for the apps to invoke action on cloudmunch
 */

class CloudmunchService {
	private $appContext = null;
	public function __construct($appContext) {
		$this->appContext = $appContext;
	}

	public function notifyUsers($message, $context, $id) {
		$dataarray = array (
		
			"project" => $this->appContext->getProject(),
			"job" => $this->appContext->getJob(),
			"context" => $context,
			"id" => $id
		);
		notifyUsersInCloudmunch($this->appContext->getMasterURL(), $message, $dataarray, $this->appContext->getDomainName());

		loghandler(INFO, "Notification send");

	}
	
public function updateDataContext( $context, $dataArray){
		updateContext($this->appContext->getMasterURL(), $context, $this->appContext->getDomainName(), $dataArray);
	}
	
	public function getDataFromContext($context){
		return getDataForContext($this->appContext->getMasterURL(), $context, $this->appContext->getDomainName());
		
	}
	
	public function updateCustomContext($context, $dataArray,$id){
		updateCustomContext($this->appContext->getMasterURL(), $context, $this->appContext->getDomainName(), $dataArray,$id);
	}
	
	public function getDataFromCustomContext($context){
		getDataForCustomContext($this->appContext->getMasterURL(), $context, $this->appContext->getDomainName());
	}
}
?>
