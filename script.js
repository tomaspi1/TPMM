function meny() {
    $("#meny").change(function () {
        const mena = $(this).val();
        if (mena === "CZK") {
            location.reload();
        }
        const kurz_castka = kurzy_object['kurzy'][mena]['dev_stred'];
        var date = new Date();
        var timeToAdd = 1000 * 60 * 60 * 2;
        var expiryTime = parseInt(date.getTime()) + timeToAdd;
        date.setTime(expiryTime);
        var utcTime = date.toUTCString();
        document.cookie = "kurz=" + kurz_castka + "; expires=" + utcTime + ";";
        document.cookie = "mena=" + mena + "; expires=" + utcTime + ";";
        location.reload();

    });
}
function vypiskurzy(data) {
    kurzy_object = data;
}
function kosik(kodProduktu) {
    let aktualni_hodnota_kosiku = "";
    if (document.cookie.indexOf('kosik=') == -1) {
        document.cookie = "kosik=" + kodProduktu;
    } else {
        const cookies = document.cookie;
        const cookie_array = cookies.split('; ');
        for (var i = 0; i < cookie_array.length; i++) {
            let c = cookie_array[i];
            const c_name = c.split('=');
            if (c_name[0] =='kosik') {
               aktualni_hodnota_kosiku = c_name[1];
            }  
        }
        const nova_hodnota_kosiku = aktualni_hodnota_kosiku + "|" + kodProduktu;
        console.log(nova_hodnota_kosiku);
        document.cookie = "kosik=" + nova_hodnota_kosiku;
        
    }
    
}
$(document).ready(function () {
    meny();
});
