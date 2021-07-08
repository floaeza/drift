
var listener = {
    onbufferingstart: function() {
        Debug('Buffering start.');
    },
    onbufferingcomplete: function() {
        Debug('............................ Buffering complete. > start: ' +Executing);
        if(Executing === false){
            UpdateQuickInfoDevice();
        }
    },
    onstreamcompleted: function() {
        Debug('Stream Completed > end');
        if(CurrentModule === 'Tv'){
            SetDigitalChannel();
        }
        if(Executing === false){
            UpdateQuickInfoDevice();
        }
    },
    onerror: function(eventType) {
        Debug('event type error : ' + eventType);
    },
    onevent: function(eventType, eventData) {
        Debug('event type: ' + eventType + ', data: ' + eventData);
    }
};

