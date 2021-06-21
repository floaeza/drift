var Listener = function() {
    onevent: function setEvent(eventType, eventData) {
        Debug("event type error : " + eventType + ", data: " + eventData);
    };
    onerror: function setError(eventType) {
        Debug("event type error : " + eventType);
    };
};