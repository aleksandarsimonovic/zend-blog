<?php

class Zend_View_Helper_Lastaccess extends Zend_View_Helper_Abstract {

    public function Lastaccess() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $last_access = $auth->getIdentity()->last_access;
            echo "Last access: ";
            echo date('d/m/Y H:i:s', strtotime($last_access));
        }
    }

}
