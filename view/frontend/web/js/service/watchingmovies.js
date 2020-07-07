define(['mage/storage'], function(storage){
    'use strict';

    return {
        getList: async function () {
            return await storage.get('rest/V1/customer/watchingmovies/movies');
        },
        update: async function(movieId, status){
            return await storage.post(
                'rest/V1/customer/watchingmovies/movies/update',
                JSON.stringify({
                    movieId: movieId,
                    status: status
                })
            );
        },
        delete: async function(movie){
            return await storage.post(
                'rest/V1/customer/watchingmovies/movies/delete',
                JSON.stringify({
                    movie: movie
                })
            );
        }
    }
});