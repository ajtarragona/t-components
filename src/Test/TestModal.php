<?php
namespace Ajtarragona\TComponents\Test;

use Ajtarragona\TComponents\Components\Modal\ModalComponent;

class TestModal extends ModalComponent
{
    
    public $closeOnClickOutside = true;
    public $closeOnEscape = true;
    public $size = 'sm';
    public $text = 'Lolo';
    public $title = 'Titutlooooo';


    public function render()
    {
        // sleep(3);
        return $this->view('t-components::tests.test-modal');
    }

   
}