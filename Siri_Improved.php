<?php
/*
__PocketMine Plugin__
name=Siri Improved, an improved version of Siri by Legomite
version=1.4.0
author=Impaddy
class=siriImproved
apiversion=10,11,12
*/

Class siriImproved implements Plugin{

    private $api;

    public function __construct(ServerAPI $api, $server = false){
        //register api
        $this->api = $api;
    }

    public function init(){
        $this->api->console->register("siri", "Siri", array($this, "command"));
        console("[Siri] Siri-Improved loaded...\n");
        console("[Siri] support and suggestions twitter.com/ipaddey\n");
    }


    public function __destruct(){
        //do nothing.
    }
}