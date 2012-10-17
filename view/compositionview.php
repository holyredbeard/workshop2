<?php

namespace View;

class CompositionView {
        
    /**
     * @return String HTML
     */
    public function merge($HTMLMembers, $HTMLReg, $HTMLRegBoat, $HTMLRemoveBoat) {
    	$out = "<div>$HTMLMembers</div>
    			<div>$HTMLReg</div>
    			<div>$HTMLRegBoat</div>
    			<div>$HTMLRemoveBoat</div>";

        return $out;
    }
}