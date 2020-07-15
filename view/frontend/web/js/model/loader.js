define(['jquery', 'rjsResolver'], function($, resolver){
    'use strict';

    const containerId = '.movies';

    return {
        startLoader: function(){
            $(containerId).trigger('processStart');
        },

        stopLoader: function(forceStop){
            let $elem = $(containerId),
                stop = $elem.trigger('processStop');

            forceStop ? stop(): resolver(stop);
        }
    }
});