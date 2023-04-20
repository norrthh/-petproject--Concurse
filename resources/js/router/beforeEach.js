const routerBeforeEach = (to, from, next) => {
    const pagetitle = to.meta.title;
    document.title = 'Галәм | ' + pagetitle;

    const token = localStorage.getItem('api_token')

    if (to.matched.some(record => record.meta.auth)) {
        if (!token) {
            next({
                name: 'index'
            });
        } else {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get('/api/v1/user/checkAuth', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('api_token')
                    }
                })
                    .then(res => {
                        next()
                    })
                    .catch(error => {
                        localStorage.removeItem('api_token')
                        next({name:'index'})
                    })
            });
        }
    } else {
        next()
    }

};

export default routerBeforeEach;
