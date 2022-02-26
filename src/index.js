

$(document).ready(function () {

    console.log("hello");

    $("#products").on("click", ".add-to-cart", function (e) {
        e.preventDefault();

        let pid = $(this).data('pid');
        let price = $(this).data('price');
        let pri = $(this).data('pri');
        let image = $(this).data('image');
        quantity=1
        console.log("add click")
        $.ajax({
            method: "POST",
            url: "config.php",
            data: { id: pid, price: price, quantity:quantity,image:image ,action:'add'},
            // dataType: "JSON"
        }).done(function (data) {
            data=JSON.parse(data);
            console.log(data);
            disply(data);
        });

    })

    $("#table").on("click", ".deletebtn", function (e) {
        e.preventDefault();
        let pid = $(this).data('pid');
        console.log("add click")
        $.ajax({
            method: "POST",
            url: "config.php",
            data: { id: pid, action: "delete" },
            //  dataType: "JSON"
        }).done(function (data) {
            console.log(data)
            let newdata = JSON.parse(data);
            disply(newdata);

        });


    })
    $("#table").on("click", ".editbtn", function (e) {
        console.log('edit')
        e.preventDefault();
        let pid = $(this).data('pid');
        action = 'edit';
        $.ajax({
            url:'config.php',
            method: 'POST',
            data:{id:pid,action:action}
        }).done(function(data){
            let dataa = JSON.parse(data);
            disply(dataa); 
        })

    })

    function disply(data) {
        let html = "<table style='margin-left:3%'><tr><th style='margin-left:3%'>product id</th><th>product price</th><th>Quantity</th><th>Action</th></tr>";
        for (let i = 0; i < data.length; i++) {
            html += "<tr style='margin-left:3%'><td> "
                + data[i].id +
                "</td><td>"
                + data[i].price +
                "</td><td>"
                + data[i].qnty +
                "</td><td>" +
                "<a href=" + " # class=editbtn  data-pid=" + data[i].id + ">  edit</a><a href=" + " # class=deletebtn  data-pid=" + data[i].id + ">  delete</a>"
            "</td></tr>"

        }
        $("#table").html(html + "</table>");
    }


})