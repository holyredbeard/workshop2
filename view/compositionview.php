<?php

namespace View;

class CompositionView {
        
    /**
     * @return String HTML
     */
    public function merge($HTMLMembers, $HTMLReg) {
    	$out = "<div>$HTMLMembers</div>
    			<div>$HTMLReg</div>";

        return $out;
    }
}