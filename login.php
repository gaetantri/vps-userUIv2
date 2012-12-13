<?php
echo "Test1\n";
error_reporting(E_ALL);
require("pve2_api.class.php");
echo "Test2\n";

$pve2 = new PVE2_API("10.10.10.1", "demo-vps", "pve", "Bonjour");
# realm above can be pve, pam or any other realm available.
echo "Test3\n";
if ($pve2->constructor_success()) {
    /* Optional - enable debugging. It print()'s any results currently */
    // $pve2->set_debug(true);

    if ($pve2->login()) {
	echo "OK. Listing nodes\n";
      foreach ($pve2->get_node_list() as $node_name) {
            print_r($pve2->get("/nodes/".$node_name."/status"));
        }
    } else {
        print("Login to Proxmox Host failed.\n");
        exit;
    }
} else {
    print("Could not create PVE2_API object.\n");
    exit;
}

?>