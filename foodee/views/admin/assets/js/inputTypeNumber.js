// var number = document.getElementById('number');

//     number.onkeydown = function(e) {
//         if(!((e.keyCode > 95 && e.keyCode < 106)
//             || (e.keyCode > 47 && e.keyCode < 58) 
//             || e.keyCode == 8)) {
//             return false;
//         }
//     }

    $(".updNumber").on("keydown",function(e){
        if(!((e.keyCode > 95 && e.keyCode != 190 && e.keyCode < 106)
            || (e.keyCode > 47 && e.keyCode < 58) 
            || e.keyCode == 8)) {
            return false;
        }
    })

    // number.onblur = function(){
    //     let numOfPpl = Number(number.value);
    //     let discount = 0;
    //     let price = 0;
    //     let pricePerPerson = parseFloat($("#priceNumber").html());
        
    //     if(numOfPpl >= 25 && numOfPpl <= 49){
    //         discount = 15;
    //     }
    //     if(numOfPpl >= 50 && numOfPpl <= 99){
    //         discount = 25;
    //     }
    //     if(numOfPpl >= 100){
    //         discount = 40;
    //     }

    //     price = numOfPpl * pricePerPerson * ((100-discount)/100);

    //     if(numOfPpl != 0){
    //         $("#sumPrice").html("Price for "+numOfPpl+" people is "+price+"$");
    //     }else{
    //         $("#sumPrice").html(""); 
    //     }
    // }
 