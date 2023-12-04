
document.addEventListener('alpine:init', () => {
  Alpine.data('nightModeSelector', (config) => ({
    theme: Alpine.$persist('light'),
    modes : {
      light: {
        label: 'Light',
        icon: "bi-brightness-high"
      },
      dark: {
        label: 'Dark',
        icon: "bi-moon-stars-fill"
      },
      auto: {
        label: 'Auto',
        icon: "bi-circle-half"
      }
    },
    init(){
      this.setMode(this.theme);
    },
    getIcon(){
      return this.modes[this.theme].icon;
    },
    getLabel(){
      return this.modes[this.theme].label;
    },
    setMode(mode){
      // console.log(mode);
      this.theme=mode;
      document.documentElement.setAttribute('data-bs-theme', mode);
    }
  }));
})
