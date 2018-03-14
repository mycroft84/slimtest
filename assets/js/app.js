$(document).ready(function () {

    function App()
    {
        var _self = this;

        this.init = function () {
            this.cacheElements();
            this.addWidgets();
            this.addEvents();
        },
        this.cacheElements = function () {
            /**
             * itt választjuk ki az elemeket az oldalról
             */
            this.button = $("#test-button");
        },
        this.addWidgets = function () {
        },
        this.addEvents = function () {
            /**
             * Ide jönnek az eventek az adott elemekre
             */

            this.button.on('click',this.buttonClick)
        },

        this.buttonClick = function () {

            axios.post('/index.php/post',{
                    ID: 12345
            })
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }

    var app = new App();
    app.init();
});