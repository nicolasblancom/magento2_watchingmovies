define(['uiComponent', 'jquery', 'ko'], function(Component, $, ko){
    'use strict';

    var self;

    return Component.extend({
        defaults: {
            movies: [
                {id: 1, label: "Movie name 1", status: false},
                {id: 2, label: "Movie name 2", status: false},
                {id: 3, label: "Movie name 3", status: false},
                {id: 4, label: "Movie name 4", status: true}
            ],
            movies2: [
                ko.observable({id: 1, label: "Movie name 1", status: false}),
                ko.observable({id: 2, label: "Movie name 2", status: false}),
                ko.observable({id: 3, label: "Movie name 3", status: false}),
                ko.observable({id: 4, label: "Movie name 4", status: true})
            ]
        },

        initialize: function(){
            self = this;
            this._super();
        },

        initObservable: function(){
            this._super().observe([
                'movies',
                'movies2'
            ]);

            return this;
        },

        switchStatus: function (data, event) {
            const movieId = $(event.target).data('id');

            let items = this.movies().map(function(_movie){
                if (_movie.id === movieId) {
                    _movie.status = !_movie.status;
                }
                return _movie;
            });

            //console.log(items);

            this.movies(items);
        },
        switchStatus2: function (data, event) {
            const movieId = $(event.target).data('id');

            console.log(self.movies2());

            let items = self.movies2().map(function(_movie){
                if (_movie().id === movieId) {

                    _movie().status = !_movie().status;
                }
                console.log(_movie());
                return ko.observable(_movie());
            });

            self.movies2(items);
        }
    })
});