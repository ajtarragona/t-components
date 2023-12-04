<?php

namespace Ajtarragona\TComponents\Components\Modal;

use InvalidArgumentException;
use Livewire\Component;

abstract class ModalComponent extends Component implements ModalContract
{
    public bool $forceClose = false;

    public int $skipModals = 0;

    public bool $destroySkipped = false;

    public $closeOnClickOutside = false;

    public $closeOnEscape = true;
    
    public $dispatchCloseEvent = true;
    
    public $destroyOnClose = true;
    
    public $size = 'md';

    public $title = null;
    
    public $closer = true;

    
    public function destroySkippedModals(): self
    {
        $this->destroySkipped = true;

        return $this;
    }

    public function skipPreviousModals($count = 1, $destroy = false): self
    {
        $this->skipPreviousModal($count, $destroy);

        return $this;
    }

    public function skipPreviousModal($count = 1, $destroy = false): self
    {
        $this->skipModals = $count;
        $this->destroySkipped = $destroy;

        return $this;
    }

    public function forceClose(): self
    {
        $this->forceClose = true;

        return $this;
    }

    public function closeModal(): void
    {
        $this->emit('closeModal', $this->forceClose, $this->skipModals, $this->destroySkipped);
    }

    public function closeModalWithEvents(array $events): void
    {
        $this->emitModalEvents($events);
        $this->closeModal();
    }

  
    
  

    private function emitModalEvents(array $events): void
    {
        foreach ($events as $component => $event) {
            if (is_array($event)) {
                [$event, $params] = $event;
            }

            if (is_numeric($component)) {
                $this->emit($event, ...$params ?? []);
            } else {
                $this->emitTo($component, $event, ...$params ?? []);
            }
        }
    }

    protected function view($viewname, $attributes=[]){
        // dd($viewname);
        return view($viewname, $attributes);
    }
}