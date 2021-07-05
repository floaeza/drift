
var listener = {
    onbufferingstart: function() {
        Debug('Buffering start.');
    },

    onbufferingcomplete: function() {
        Debug('Buffering complete. > start');
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

    // Se actualiza cada segundo, genera demasiados logs
    // oncurrentplaytime: function(currentTime) {
    //     Debug('Current playtime: ' + currentTime);
    // },

    onerror: function(eventType) {
        Debug('event type error : ' + eventType);
    },

    onevent: function(eventType, eventData) {
        Debug('event type: ' + eventType + ', data: ' + eventData);
    }
};

function setPowerStateChangeListener(){

    try {
        var onchange = function(val){
            Debug("changed function."+JSON.stringify(val));
            getPowerState();
        };
        b2bpower.setPowerStateChangeListener(onchange);
        Debug("setPowerStateChangeListener");

    } catch (e) {
        // TODO: handle exception
        throw(e);
    }

}

function getPowerState() {

    Debug("[getPowerState] function call");
    var getPowerState = null;
    try {

        Debug("[getPowerState] b2bpower object : "+b2bpower);
        getPowerState = b2bpower.getPowerState();

    } catch (e) {

        Debug("[getPowerState] call syncFunction exception [" + e.code + "] name: " + e.name + " message: " + e.message);
        Debug("[getPowerState] call syncFunction exception [" + e.code + "] name: " + e.name + " message: " + e.message);
    }
    if(null !== getPowerState){
        Debug("[getPowerState] call syncFunction type: " + getPowerState);
    }
}

setPowerStateChangeListener();