
    document.addEventListener('alpine:init', () => {
        Alpine.data('tFile', (config) => ({
            imageUrl: '',

            selectFile (event) {
                const file = event.target.files[0]
                const reader = new FileReader()

                if (event.target.files.length < 1) {
                    return
                }

                reader.readAsDataURL(file)

                reader.onload = () => (this.imageUrl = reader.result)
            },
        }))
    })
