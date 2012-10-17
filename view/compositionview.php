<?php

namespace View;

class CompositionView {
        
    /**
     * @return String HTML
     */
    public function merge($HTMLMembers, $HTMLReg, $HTMLBoat) {
    	$out = "<div>$HTMLMembers</div>
    			<div>$HTMLReg</div>
    			<div>$HTMLBoat</div>";

        return $out;
    }
}