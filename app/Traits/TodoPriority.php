<?php

namespace app\Traits;
  
trait TodoPriority {

    public function checkListPriority($priority) {
        return match($priority){
            1 => '<i class="fa-solid fa-star text-danger fa-beat" title="High Priority"></i>',
            0 => null,
            'default' => null
        };
    } 

}