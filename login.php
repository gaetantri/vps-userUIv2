<?php

error_reporting(E_ALL);
include("pve2_api.class.php");

$pveuser = new PVE2_API("10.10.10.1", "demo-vps", "pve", "Bonjour");
$pveroot = new PVE2_API("10.10.10.1", "root", "pve", "Bonjour");
if ($pveuser->constructor_success() && $pveroot->constructor_success()) {
    if ($pveuser->login() && $pveroot->login()) {
		echo "OK. Listing OpenVZ\n";
		print_r($pveuser->get("/nodes/ns212937/openvz"));	
		echo "OK. Listing template</br>\n";
		print_r($pveroot->get("/nodes/ns212937/storage/local/content/templates"));					 
    } else {
        print("Login to Proxmox Host failed.\n");
		exit;
    }
} else {
    print("Could not create PVE2_API object.\n");
    exit;
}

?>