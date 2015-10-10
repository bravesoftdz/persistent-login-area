<?php
namespace PLA_AjaxHelper;

include_once(__DIR__.'/../lib/inc.php');

\PersistentLoginArea\Members::SessionStart();

if (!\PersistentLoginArea\Members::IsAuthenticated()){
	AH::jdie(['success'=>false, 'message'=>	\PersistentLoginArea\Members::GetStringError('nonauth')]);
}

AH::jdie(['success'=>1, 'result'=> \PersistentLoginArea\Members::FormAcceptRememberMe($_GET)]);
