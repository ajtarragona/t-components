
    document.addEventListener('alpine:init', () => {
        Alpine.data('tButton', (config) => ({

            ripple:config.ripple??false,

            init() {
                
            },

            createRipple(event) {
                
                if(!this.ripple) return;
                
                // console.log('createRipple',event);
                const button = this.$refs.button;
        
                const circle = document.createElement("span");
                const diameter = Math.max(button.clientWidth, button.clientHeight);
                const radius = diameter / 2;
                
                // Obtiene la posición del ratón dentro del botón
                const mouseX = event.clientX;
                const mouseY = event.clientY;

                // Obtiene la posición del botón en relación a la ventana
                const botonRect = button.getBoundingClientRect();
                const botonX = botonRect.left; //+ window.scrollX;
                const botonY = botonRect.top;// + window.scrollY;

                // console.log('mouse',mouseX,mouseY);
                // console.log('botonRect',botonRect);
                // console.log('left',(mouseX - botonX  ), 'top', (mouseY - botonY  ));
                circle.style.width = circle.style.height = `${diameter}px`;
                circle.style.left = (mouseX - botonX - radius ) + 'px';
                circle.style.top = (mouseY - botonY - radius ) + 'px';
                // circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
                // circle.style.top = `${event.clientY - button.offsetTop - document.documentElement.scrollTop - radius}px`;
                circle.classList.add("ripple-fx");
        
                const ripple = button.getElementsByClassName("ripple-fx")[0];
        
                if (ripple) {
                    ripple.remove();
                }
        
                button.appendChild(circle);
            }
            
        }))
    })
