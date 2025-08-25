function changeView() {

  var signInBox = document.getElementById("signInBox");
  var signUpBox = document.getElementById("signUpBox");

  signInBox.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}

var typed = new Typed(".text", {
  strings: ["Shehan Furniture..."],
  typeSpeed: 100,
  backSpeed: 100,
  backDelay: 1000,
  loop: true
});

ScrollReveal({
  //reset: true,
  distance: '100px',
  duration: 2500,
  delay: 400
});

ScrollReveal().reveal('.signIn-box, .homeChair, .img1', { delay: 300, origin: 'right' });
ScrollReveal().reveal('.content1', { delay: 300, origin: 'left' });

$(document).ready(function () {
  $('#teamCarousel').carousel({
    interval: 3000,
    pause: 'hover',
    wrap: true
  });
});



function signUp() {

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  var f = new FormData();

  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("e", email.value);
  f.append("m", mobile.value);
  f.append("p", password.value);
  f.append("u", username.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      //alert(response);

      if (response == "success") {

        document.getElementById("msg1").innerHTML = "Successful";
        document.getElementById("msg1").className = "alert alert-success";
        document.getElementById("msgDiv1").className = "d-block";
        // alert("success");

        window.location.reload();

        fname.value = "";
        lname.value = "";
        email.value = "";
        mobile.value = "";
        username.value = "";
        password.value = "";


      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgDiv1").className = "d-block";



      }
    }
  };

  request.open("POST", "signUpprocess.php", true);
  request.send(f);
}

function signIn() {
  var un = document.getElementById("un");
  var pw = document.getElementById("pw");
  var rm = document.getElementById("rm");

  //  alert(un.value);

  var f = new FormData();

  f.append("u", un.value);
  f.append("p", pw.value);
  f.append("r", rm.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;

      //alert(response);

      if (response == "Success") {
        window.location = "index.php";
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";
      }

    }
  }

  request.open("POST", "signInprocess.php", true);
  request.send(f);
}


function AdminLogin() {
  // alert();

  var un = document.getElementById("un");
  var pw = document.getElementById("pw");

  var f = new FormData();

  f.append("u", un.value);
  f.append("p", pw.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;

      // alert(response);

      if (response == "success") {
        window.location = "admidashboard.php";

      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";
      }

    }

  };

  request.open("POST", "AdminLoginProcess.php", true);
  request.send(f);
}

function loadUser() {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      document.getElementById("tb1").innerHTML = response;
    }
  }
  request.open("POST", "adminloadUserProcess.php", true);
  request.send();
}

function userSearch() {
  var user = document.getElementById("usernames");

  var f = new FormData();

  f.append("u", user.value);
  // alert(user.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("tb1").innerHTML = response;


    }
  }

  request.open("POST", "adminUserSearchProcess.php", true);
  request.send(f);

}

function changeUserStatus(id) {

  // alert();
  var userid = id;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Deactive" || response == "Active") {

        window.location.reload();
      } else {
        alert(response);
      }

    }
  }

  request.open("GET", "changeUsreStatusProcess.php?id=" + userid, true);
  request.send();



}

function reload() {
  location.reload();
}

function addPlaceName() {

  var place = document.getElementById("placeName");

  var f = new FormData();

  f.append("p", place.value);
  // alert(place.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      if (response == "success") {

        document.getElementById("msg1").innerHTML = "Place Name Added Successfuly";
        document.getElementById("msg1").className = "alert alert-success";
        document.getElementById("msgDiv1").className = "d-block";
        place.value = "";

      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgDiv1").className = "d-block";
      }

    }
  }

  request.open("POST", "placeNameAddProcess.php", true);
  request.send(f);


}

function addCatName() {
  // alert();

  var catName = document.getElementById("catName");

  var f = new FormData();

  f.append("c", catName.value);
  // alert(catName.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      if (response == "success") {

        document.getElementById("msg2").innerHTML = "Category Name Added Successfuly";
        document.getElementById("msg2").className = "alert alert-success";
        document.getElementById("msgDiv2").className = "d-block";
        catName.value = "";

      } else {

        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";

      }

    }
  }

  request.open("POST", "categoryNameAddProcess.php", true);
  request.send(f);
}

function addWoodName() {
  var wood = document.getElementById("woodName");

  var f = new FormData();

  f.append("wo", wood.value);
  // alert(wood.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      if (response == "success") {

        document.getElementById("msg3").innerHTML = "Wood Name Added Successfuly";
        document.getElementById("msg3").className = "alert alert-success";
        document.getElementById("msgDiv3").className = "d-block";
        wood.value = "";

      } else {

        document.getElementById("msg3").innerHTML = response;
        document.getElementById("msgDiv3").className = "d-block";

      }

    }
  }

  request.open("POST", "woodNameAddProcess.php", true);
  request.send(f);

}

function colorName() {

  var color = document.getElementById("colorName");

  var f = new FormData();

  f.append("clr", color.value);
  // alert(color.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      if (response == "success") {

        document.getElementById("msg4").innerHTML = "Color Name Added Successfuly";
        document.getElementById("msg4").className = "alert alert-success";
        document.getElementById("msgDiv4").className = "d-block";
        color.value = "";

      } else {

        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgDiv4").className = "d-block";

      }

    }
  }

  request.open("POST", "colorNameAddProcess.php", true);
  request.send(f);

}

function productReg() {
  // alert();

  var pname = document.getElementById("productName");
  var place = document.getElementById("selectPlace");
  var cat = document.getElementById("selectCategory");
  var wood = document.getElementById("selectWood");
  var color = document.getElementById("selectColor");
  var desc = document.getElementById("productDesc");
  var image = document.getElementById("imageUploder");

  var f = new FormData();

  f.append("pro", pname.value);
  f.append("pla", place.value);
  f.append("cat", cat.value);
  f.append("w", wood.value);
  f.append("co", color.value);
  f.append("desc", desc.value);
  f.append("i", image.files[0]);

  // alert(pname.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        // alert("Product Added successfuly");
        // window.location.reload();
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: "success",
          title: "Product Registation successfully"
        });
      } else {
        // alert(response);
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgDiv5").className = "d-block";
      }

    }
  }

  request.open("POST", "productRegProcess.php", true);
  request.send(f);
}

function productDetailsload() {
  // alert();

  var st_id = document.getElementById("selectProduct");

  var f = new FormData();

  f.append("pn", st_id.value)

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status) {
      var response = request.responseText;
      // alert(response);

      document.getElementById("pv").innerHTML = response;
    }
  };

  request.open("POST", "loadProductDetailsProcess.php", true);
  request.send(f);

}

function stockUpdate() {

  var productname = document.getElementById("selectProduct");
  var qty = document.getElementById("productQty");
  var price = document.getElementById("productPrice");

  // alert(productname.value);

  var f = new FormData();

  f.append("product", productname.value);
  f.append("qty", qty.value);
  f.append("price", price.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      alert(response);
    }
  }

  request.open("POST", "adminStockUpdateProcess.php", true);
  request.send(f);

}

function changeProductStatus(stock_id) {


  // alert();
  var stock_id = stock_id;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Disable" || response == "Enable") {

        window.location.reload();
      } else {
        alert(response);
      }

    }
  }

  request.open("GET", "changeStockProductStatusProcess.php?stock_id=" + stock_id, true);
  request.send();

}

function printArea() {
  // alert();

  var orginalContent = document.body.innerHTML;
  var printArea = document.getElementById("printArea").innerHTML;

  document.body.innerHTML = printArea;

  window.print();

  document.body.innerHTML = orginalContent;

}

function veiwSearch() {
  // alert();
  document.getElementById("navSearch").className = "d-block";
}

function loadProduct(x) {
  var page = x;
  // alert();

  var f = new FormData();

  f.append("p", page);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("pid").innerHTML = response;
    }
  }

  request.open("POST", "loardProductProcess.php", true);
  request.send(f);

}

function searchProduct(x) {

  var page = x;

  var product = document.getElementById("product");

  // alert(page);
  // alert(product.value);

  var f = new FormData();

  f.append("p", product.value);
  f.append("pg", page);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      document.getElementById("pid").innerHTML = response;
      document.getElementById("navSearch").className = "d-none";

    }
  }

  request.open("POST", "basicSearchProcess.php", true);
  request.send(f);

}

function advSearchProduct(x) {
  // alert();

  var page = x;
  var color = document.getElementById("color");
  var cat = document.getElementById("cat");
  var wood = document.getElementById("wood");
  var place = document.getElementById("place");
  var min = document.getElementById("min");
  var max = document.getElementById("max");

  // alert(place.value);

  var f = new FormData();
  f.append("pg", page);
  f.append("col", color.value);
  f.append("cat", cat.value);
  f.append("w", wood.value);
  f.append("p", place.value);
  f.append("min", min.value);
  f.append("max", max.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      document.getElementById("pid").innerHTML = response;
      document.getElementById("navSearch").className = "d-none";
    }
  }

  request.open("POST", "advanceSearch.php", true);
  request.send(f);


}

function uploadImg() {
  //  alert();

  var image = document.getElementById("profileimage");

  var f = new FormData();

  f.append("i", image.files[0]);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      // alert(response);

      if (response == "empty") {
        Swal.fire({
          title: "Profile Picture?",
          text: "Please Select the image",
          icon: "warning"
        });
      } else {
        document.getElementById("i").src = response;

        Swal.fire({
          title: "Profile Picture",
          text: "Profile Update Has been Successfuly!",
          icon: "success"
        });

        img.value = "";
      }
    }
  };

  request.open("POST", "profileImageUploadProcess.php", true);
  request.send(f);

}

function updateProfile() {
  // alert();

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var password = document.getElementById("pw");
  var no = document.getElementById("no");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var city = document.getElementById("city");

  var f = new FormData();

  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("e", email.value);
  f.append("m", mobile.value);
  f.append("pw", password.value);
  f.append("no", no.value);
  f.append("l1", line1.value);
  f.append("l2", line2.value);
  f.append("ci", city.value);

  var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "success") {

              Swal.fire({
                title: "Update Success",
                text: "Profile Update Has been Successfuly!",
                icon: "success"
              });     
            } else {
              document.getElementById("alert1").innerHTML = response;
              document.getElementById("alertDiv").className = "d-block";
              document.getElementById("alert1").className = "alert alert-danger";
            }
        }
    };

    request.open("POST", "userProfileUpdateProcess.php", true);
    request.send(f);
}

function signOut() {

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          Swal.fire({
            title: "Are you sure?",
            text: response,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, SignOut it!"
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: "Deleted!",
                text: "You have SignOut now",
                icon: "success"
              });
              reload();
            }           
          });
          
      }
  };

  request.open("POST", "signOutProcess.php", true);
  request.send();
}

function addtoCart(x){

  // alert(x);

  var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {


        var f = new FormData();

        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(response);

                swal("Add to cart is!", response, "success");
                qty.value = "";
            }
        };

        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);

    } else {
        alert("Please Enter Valid qty");
    }
}

function loadCart() {
  // alert();

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          // alert(response);
          document.getElementById("cartA").innerHTML = response;
          
      }
  };

  request.open("POST", "loardCartProcess.php", true);
  request.send();

}

function incrementCartQty(x) {

  // alert(x);
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) + 1;
  // alert(newQty);

  var f = new FormData();

  f.append("c", cartId);
  f.append("q", newQty);



  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          // alert(response);
          if (response == "Success") {
              qty.value = parseInt(qty.value) + 1;
              loadCart();
          } else {
              alert(response);
          }
      }
  };

  request.open("POST", "updateQtyProcess.php", true);
  request.send(f);

}

function decrementCartQty(x) {

  // alert(x);
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) - 1;
  // alert(newQty);

  var f = new FormData();

  f.append("c", cartId);
  f.append("q", newQty);

  if (newQty > 0) {

      var request = new XMLHttpRequest();

      request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
              var response = request.responseText;
              // alert(response);
              if (response == "Success") {
                  qty.value = parseInt(qty.value) - 1;
                  loadCart();
              } else {
                  alert(response);
              }
          }
      };

      request.open("POST", "updateQtyProcess.php", true);
      request.send(f);
  }
}

function removeCart(x) {
  // alert(x);

  


      var f = new FormData();
      f.append("c", x);

      var request = new XMLHttpRequest();

      request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
              var response = request.responseText;

              Swal.fire({
                title: "Are you sure?",
                text: response,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                  });
                  reload();
                }
              });

              
          }
      };

      request.open("POST", "removeCartProcess.php", true);
      request.send(f);

  
}

function checkOut(){
  // alert();

  var f = new FormData();

  f.append("cart",true);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          // alert(response);

          var payment = JSON.parse(response);
          doChekout(payment,"checkoutProcess.php");
      }
  };

  request.open("POST","paymentProcess.php",true);
  request.send(f);
}

function doChekout(payment,path) {

  // Payment completed. It can be a successful failure.
  payhere.onCompleted = function onCompleted(orderId) {
      console.log("Payment completed. OrderID:" + orderId);
      // Note: validate the payment and show success or failure page to the customer

      var f = new FormData();

      f.append("payment",JSON.stringify(payment));

      var request = new XMLHttpRequest();

      request.onreadystatechange = function(){
          if (request.readyState == 4 && request.status == 200) {
              var response = request.responseText;
              // alert(response);
              var order = JSON.parse(response);
              if (order.resp = "success") {
                // reload();
                window.location = "invoice.php?orderId=" + order.order_id;
              } else {
                  alert(response);
              }
          }
      };

      request.open("POST",path,true);
      request.send(f);
  };

  // Payment window closed
  payhere.onDismissed = function onDismissed() {
      // Note: Prompt user to pay again or show an error page
      console.log("Payment dismissed");
  };

  // Error occurred
  payhere.onError = function onError(error) {
      // Note: show an error page
      console.log("Error:"  + error);
  };

  // Show the payhere.js popup, when "PayHere Pay" is clicked
  //document.getElementById('payhere-payment').onclick = function (e) {
      payhere.startPayment(payment);
  //};
  
}

function buyNow(stockId){
  // alert(stockId);

  var qty = document.getElementById("qty");

  if (qty.value > 0) {
      // alert("ok");

      var f = new FormData();

      f.append("cart",false);
      f.append("stockId",stockId);
      f.append("qty",qty.value);

      var request = new XMLHttpRequest();

      request.onreadystatechange = function(){
          if (request.readyState == 4 && request.status == 200) {
              var response = request.responseText;
              // alert(response);

              var payment = JSON.parse(response);

              payment.stock_id = stockId;
              payment.qty = qty.value;
              doChekout(payment,"buynowProcess.php");
          }
      };

      request.open("POST","paymentProcess.php",true);
      request.send(f);

  } else {
      alert("please eneter valid qty");
  }
}

function sendEmail(){
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var ms = document.getElementById("ms");

  var f = new FormData();

  f.append("f",fname.value);
  f.append("l",lname.value);
  f.append("e",email.value);
  f.append("m",ms.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      alert(response);
    }
  }

  request.open("POST","emailSendProcess.php",true);
  request.send(f);
}

function changeViewfbox() {

  var sbox = document.getElementById("signInBox");
  var fbox = document.getElementById("fbox");

  sbox.classList.toggle("d-none");
  fbox.classList.toggle("d-none");
}

var forgotPasswordModal;

function forgotPassword() {

    var email = document.getElementById("email2");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var text = request.responseText;

            if (text == "Success") {
                alert("Verification code has sent successfully. Please check your Email.");
                var modal = document.getElementById("fpmodal");
                forgotPasswordModal = new bootstrap.Modal(modal);
                forgotPasswordModal.show();
            } else {
                alert(text);
            }

        }
    }

    request.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    request.send();

}

function resetPassword() {

  var email = document.getElementById("email2");
  var newPassword = document.getElementById("np");
  var retypePassword = document.getElementById("rnp");
  var verification = document.getElementById("vcode");

  var form = new FormData();
  form.append("e", email.value);
  form.append("n", newPassword.value);
  form.append("r", retypePassword.value);
  form.append("v", verification.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.status == 200 & request.readyState == 4) {
          var response = request.responseText;
          if (response == "success") {
              alert("Password updated successfully.");
              forgotPasswordModal.hide();
          } else {
              alert(response);
          }
      }
  }

  request.open("POST", "resetPasswordProcess.php", true);
  request.send(form);

}

function loadChart(){
  // alert();

  var ctx = document.getElementById("myChart");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          // alert(response);

          var data = JSON.parse(response);

          new Chart(ctx, {
              type: 'bar',
              data: {
                labels: data.labels,
                datasets: [{
                  label: '# of Votes',
                  data: data.data,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
      }
  };

  request.open("POST","loadChartProcess.php",true);
  request.send();
}