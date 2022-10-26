// id generator
setInterval(() => {
  let g = document.getElementById('id')

  g.value = Math.floor((Math.random() * (99999 - 10000)) + 10000)
}, 1000);


// Registration
$("#SIGNUPFORM").submit((e) => {
  e.preventDefault();
  var form = $("#SIGNUPFORM").serialize();
  $.ajax({
    url: "ajax.php",
    method: 'post',
    data: form,
    success: function (res) {
      if (res === 'success') {
        Swal.fire({
          icon: 'success',
          title: 'Register Successfully',
          text: 'Please Login your account to play the game',
          timer: 5000,
          showConfirmButton: true,
          confirmButtonColor: "rgb(72, 140, 241)",
        })
        setInterval(function () {
          location.reload()
        }, 3000)
      } else if (res === 'Username Has Already Taken') {
        Swal.fire({
          icon: 'error',
          iconColor: "red",
          title: 'Something went wrong',
          text: "Username Has Already Taken",
          showConfirmButton: true,
          confirmButtonColor: "rgb(72, 140, 241)",
        })
      } else {
        Swal.fire({
          icon: 'error',
          iconColor: "red",
          title: 'Something went wrong',
          text: res,
          showConfirmButton: true,
          confirmButtonColor: "rgb(72, 140, 241)",
        })
      }
    }
  })
})


// Login
$("#LoginForm").submit((e) => {
  e.preventDefault();
  var form_login = $("#LoginForm").serialize();
  $.ajax({
    url: "ajax.php",
    method: 'POST',
    data: form_login,
    success: function (res) {
      var data = $.parseJSON(res);
      var name = document.querySelector('#name-user').value;
      if (data.status == 'success') {

        Swal.fire({
          icon: 'success',
          title: 'Login Success',
          text: 'Hallo!!' + name,
          html: '<b>Welcome back, ' + name,
          timer: 5000,
          showConfirmButton: false,
          didOpen: () => {
            timerInterval = setInterval(() => {
              Swal.getHtmlContainer().querySelector('strong')
                .textContent = (Swal.getTimerLeft() / 1000)
                .toFixed(0)
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        })
      } else if (data.status == 'errors') {
        Swal.fire({
          icon: 'error',
          iconColor: "red",
          title: 'Something Went Wrong',
          text: 'Fill Out The Form',
          timer: 3000,
          showConfirmButton: true,
          confirmButtonColor: "rgb(72, 140, 241)",
        })
        return false;
      } else {
        Swal.fire({
          icon: 'error',
          iconColor: "red",
          title: 'Something Went Wrong',
          text: 'Check username or password',
          timer: 3000,
          showConfirmButton: true,
          confirmButtonColor: "rgb(72, 140, 241)",
        })
        return false;
      }
      setInterval(function () {
        location.href = "game.php"
      }, 5000)
    }
  })
})