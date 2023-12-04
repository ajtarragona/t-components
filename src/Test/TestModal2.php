<?php
namespace Ajtarragona\TComponents\Test;

use Ajtarragona\TComponents\Components\Modal\ModalComponent;

class TestModal2 extends ModalComponent
{
    
    public $closeOnClickOutside = false;
    public $closeOnEscape = false;
    public $size = 'sm';
    public $text = 'Lolo';


    public function render()
    {
        // sleep(3);
        return view('t-components::tests.test-modal-2');
    }

    public function save(){
        $this->closeModal();
    }

    public function saveAndClose(){
        $this->skipPreviousModal()->closeModal();
    }
}