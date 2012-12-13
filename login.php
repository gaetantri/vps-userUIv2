<?php
require("./pve2-api-php-client/pve2_api.class.php");

$pve2 = new PVE2_API("hostname", "username", "realm", "password");
# realm above can be pve, pam or any other realm available.

if ($pve2->constructor_success()) {
    /* Optional - enable debugging. It print()'s any results currently */
    // $pve2->set_debug(true);

    if ($pve2->login()) {
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