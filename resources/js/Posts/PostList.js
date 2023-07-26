    let  setup = () => {
        return {
            nextUrl: null,
            search: '',
            urlForm: 'savePost()',
            posts: [],
            postsModal: {
                name: '',
                body: '',
            },
            showModal: false,
            init() {
                this.getPosts();
            },
            get SearchItem() {
                if (this.search === '')
                    return this.posts

                return this.posts.filter(post => {
                    console.log(post.name.toLowerCase().includes(this.search.toLowerCase()))
                    return post.name.toLowerCase().includes(this.search.toLowerCase())
                })
            },
            getPosts() {
                const self = this;
                let url = (self.nextUrl != null) ? (self.nextUrl) : (routeList);
                let token = this.$store.post.token;
                console.log(token)
                axios.get(url, {
                    headers: {
                        Authorization: 'Bearer ' + token,
                        'Content-Type': 'application/json'
                    }
                }).then((response) => {
                    self.posts = self.posts.concat(response.data.data);
                    self.nextUrl = response.data.links.next;
                }).catch(e => {
                    console.log(e)
                })
            },
            savePost() {
                const self = this;
                let token = this.$store.post.token;
                if (typeof this.postsModal.id != "undefined" || this.postsModal.id != null) {
                    console.log('true');
                    console.log(this.postsModal.id)

                    axios.put(routeListUpdate, self.postsModal, {
                        headers: {
                            Authorization: 'Bearer ' + token,
                            'Content-Type': 'application/json'
                        }
                    }).then((response) => {
                        console.log(response)
                        self.posts = response.data.data;
                        self.nextUrl = response.data.links.next;
                        this.showModal = false;
                    });
                }
                else {
                    console.log('false')
                    axios.post(routeListStore, self.postsModal, {
                        headers: {
                            Authorization: 'Bearer ' + token,
                            'Content-Type': 'application/json'
                        }
                    }).then((response) => {
                        console.log(response)
                        self.posts = response.data.data;
                        self.nextUrl = response.data.links.next;
                        this.postsModal = {
                            name: '',
                            body: ''
                        };
                        this.showModal = false;
                    });
                }

            },
            editPost(post) {
                this.postsModal.name = post.name;
                this.postsModal.body = post.body;
                this.postsModal.id = post.id;
                this.urlForm = 'update()';
                this.showModal = true;
            },
            deletePost(post) {
                let token = this.$store.post.token;
                const self = this;
                axios.delete('/posts/' + post, {
                    headers: {
                        Authorization: 'Bearer ' + token,
                        'Content-Type': 'application/json'
                    }
                }).then((response) => {
                    console.log(response);
                    self.posts = response.data.data;
                    self.nextUrl = response.data.links.next;
                });

            },

        }
    }