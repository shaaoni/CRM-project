    function user(event) {
          event.preventDefault();

          var username = document.getElementById("username").value;
          var password = document.getElementById("password").value;

          if (username === "user123" && password === "user") {
               window.location.replace("dashboard.php");
          } else {
              alert("Invalid information");
              return;
          }
    }