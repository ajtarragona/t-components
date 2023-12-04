<div id="alpine-card">
    
        <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message" ></h1>

        <div x-data="{ open: false }" class="dropdown mb-2">
            <button @click="open = !open; $dispatch('inc')" class="btn btn-secondary btn-sm dropdown-toggle"  :class="{ 'btn-primary': ! open }">Expand</button>
        
            <div class="dropdown-menu show" x-show="open" 
            x-transition:enter.duration.100ms
            x-transition:leave.duration.100ms
            x-on:click.outside="open = false" x-on:keyup.escape.window="open = false">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>

            </div>
        </div>

        <div x-data="{ count: 0 }" @inc.window="count+=5" class=" mb-2">
            <button x-on:click="count++" class="btn btn-secondary">Increment</button>
        
            <span x-text="count"></span>
        </div>

        <div
            x-data="{
                search: '',

        items: ['foo', 'bar', 'baz'],

        get filteredItems() {
            return this.items.filter(
                i => i.startsWith(this.search)
            )
        }
        }"
        >
        <input x-model="search" placeholder="Search..." class="form-control" type="search">
        <br/>
        
        <ul>
        <template x-for="item in filteredItems" :key="item">
            <li x-text="item"></li>
        </template>
        </ul>



        </div>

        <div x-data="{current:'first',tabs:['first','second','third']}" class="box-card ">
            
           
            
            <ul class="nav nav-underline" role="tablist">

                <template x-for="tab in tabs">
                    <li class="nav-item" role="presentation">
                        <button 
                            class="nav-link" 
                            :class = " current == tab?'active':'' "
                            
                            :id="tab+'tab'" 
                            x-on:click="current = tab"
                            type="button" role="tab" x-text="tab + ' Tab'">
                        </button>
                      </li>

                 </template>
            </ul>

            <div class="tab-content" id="myTabContent">
                
                <template x-for="tab in tabs">
                    <div 
                    class="tab-pane fade py-2" 
                    :class = " current == tab?'show active':'' "
                    x-text="'This is the '+tab+' Tab'" x-show="tab==current"
                    role="tabpanel" 
                    aria-labelledby="home-tab" 
                    tabindex="0"></div>
                    
                </template>
            </div>
        </div>
        
       
       
        

    <script>
        document.addEventListener('alpine:init', () => {
        
            Alpine.store('tabs', {
                current: 'first',
            
                items: ['first', 'second', 'third'],
            })
        });
    </script>

</div>