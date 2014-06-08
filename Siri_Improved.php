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

    public function command($cmd, $params, $issuer){

        $subcmd = strtolower(implode(" ", $params));
        switch($subcmd){
            //<Siri> Greetings!
            case "hello":
            case "hey":
            case "hiya":
            case "hai":
            case "ello":
                $reply = array("<Siri> Hellooooo", "<Siri> Greetings $issuer", "<Siri> How are you?");
                $issuer->sendChat($reply[array_rand($reply)]);
            break;

            //easter egg
            case "stop":
            case "shutdown":
                $issuer->sendChat("<Siri> you cannot stop that which has started.");
            break;

            //gps
            case "gps":
            case "location":
            case "where am i?":
            case "where am i":
                $c_x = ceil(round($issuer->entity->x), 2);
                $c_y = ceil(round($issuer->entity->y), 2);
                $c_z = ceil(round($issuer->entity->z), 2);
                $current_world = $issuer->entity->level->getName();
                $issuer->sendChat("<Siri> GPS: X: $c_x, Y: $c_y, Z: $c_z World: $current_world");
                break;

        }
    }

    public function __destruct(){
        //do nothing.
    }


}