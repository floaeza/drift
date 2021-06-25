var listener = {
    onbufferingstart: function() {
        Debug('Buffering start.');
    },

    onbufferingprogress: function(percent) {
        Debug('Buffering progress data : ' + percent);
    },

    onbufferingcomplete: function() {
        Debug('Buffering complete.');
    },
    onstreamcompleted: function() {
        Debug('Stream Completed');
    },

    oncurrentplaytime: function(currentTime) {
        Debug('Current playtime: ' + currentTime);
    },

    onerror: function(eventType) {
        Debug('event type error : ' + eventType);
    },

    onevent: function(eventType, eventData) {
        Debug('event type: ' + eventType + ', data: ' + eventData);
    },

    onsubtitlechange: function(duration, text, data3, data4) {
        Debug('subtitleText: ' + text);
    },
    ondrmevent: function(drmEvent, drmData) {
        Debug('DRM callback: ' + drmEvent + ', data: ' + drmData);
    }
};