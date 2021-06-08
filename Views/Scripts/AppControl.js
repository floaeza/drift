
function InitialDataControl(){    
    if (typeof(ASTB) !== 'undefined') {
        AminoDeviceControl();
    } else if (typeof(ENTONE) !== 'undefined') {
        KamaiDeviceControl();
    } else if (typeof(gSTB) !== 'undefined'){
        InfomirDeviceControl();
    }           
}

function AminoDeviceControl(){
    MacAddressControl  = ASTB.GetMacAddress();
    VendorControl      = 'Amino';
}

function KamaiDeviceControl(){
    MacAddressControl  = ENTONE.stb.getMacAddress();
    VendorControl      = 'Kamai';
}

function InfomirDeviceControl(){
    MacAddressControl  = gSTB.GetDeviceMacAddress();
    VendorControl      = gSTB.GetDeviceVendor();
}


function DBControl(){

}


InitialDataControl();
setInterval(DBControl, 1000);