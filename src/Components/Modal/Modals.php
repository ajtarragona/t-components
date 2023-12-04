<?php

namespace Ajtarragona\TComponents\Components\Modal;

use Exception;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Reflector;
use Illuminate\View\View;
use Livewire\Component;
use ReflectionClass;

class Modals extends Component
{
    public ?string $activeComponent;

    public array $components = [];

    public function getListeners(): array
    {
        return [
            'openModal',
            'destroyComponent',
        ];
    }


    public function resetState(): void
    {
        $this->components = [];
        $this->activeComponent = null;
    }

    public function openModal($component, $attributes = []): void
    {
        $requiredInterface = ModalContract::class;
        $componentClass = app('livewire')->getClass($component);
        // dd($componentClass);
        $reflect = new ReflectionClass($componentClass);

        if ($reflect->implementsInterface($requiredInterface) === false) {
            throw new Exception("[{$componentClass}] does not implement [{$requiredInterface}] interface.");
        }

        $id = md5($component.serialize($attributes));

        $componentInstance=new $componentClass;
        $attributes=array_merge($componentInstance->getPublicPropertiesDefinedBySubClass(), $attributes);

        $this->components[$id] = [
            'name' => $component,
            'attributes' => $attributes,
        ];

        $this->activeComponent = $id;

        $this->emit('activeModalComponentChanged', $id);
    }

    
    public function destroyComponent($id): void
    {
        unset($this->components[$id]);
    }

   
    public function render(): View
    {
        
        $theme=config('t-components.theme');
        return view('t-components::layouts.modals', []);
    }
}