Alpine.data('huanjay', () => ({

    kategori : [],
    fetchingdata() {
        fetch('http://localhost:8000/api/kategori')
            .then(async (response) => {
                this.kategori = await response.json()     
            })
        // .catch((error) => { })
    }
}))