var toggle = new Vue({
    el: '#rogin-nav',
    data: {
        isActive: false
    },
    methods: {
        active: function()　{
            this.isActive = !this.isActive
        }
    }
})


new Vue({
    el: '#search',
    data: {
        massage: '探す！'
    },
    methods: {
        mouseover: function () {
            this.message = 'Good'
        },
        mouseleave: function () {

        }
    }
})
