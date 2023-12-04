
window.addEventListener('live-component-changed', event => {
    // console.log(event.target);
    initComponents(event.target);

});

window.livewireCall = function(elem, callback, ...args ){
    // console.log(elem, 'livewireCall :' + callback, args);
    var id=elem.getAttribute('wire:id');
    // console.log(id);
    if(id){
        var component=window.livewire.find(id);
        // console.log(component);
        if(component) component.call(callback, ...args);
    }
    return this;
    //initNavs(this);
  };