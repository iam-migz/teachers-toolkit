<style>
body, html{ min-height: 100%; }
body{
  background-image: url('<?=PATH?>/images/home.jpg');  
  background-repeat: no-repeat;
  background-size: cover;
  margin: 0;
}
.navbar-brand{
  margin-left: 10%;
  font-weight: 400;
  font-size: 23px;
}
.navbar-collapse{
  margin-right: 10%;
}
.nav-item{
  font-size: 19px;
  margin-right: 5%;
}
@media screen and (max-width: 990px) {
  .navbar-brand{
    font-size: 30px;
    margin-left: 0;
  }
  .navbar-collapse{
    margin-right: 0%;
  }
}
#change-pass-form {
  width: 80%;
  margin: 0 auto;
}
#change-pass-form button {
  width: 100%;
  padding: 1em;
}

</style>
<nav class="navbar navbar-expand-lg navbar-dark default-color sticky-top">
  <a class="navbar-brand" rel="next" href="<?=PATH?>/teacher/home.php">Teachers Toolkit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" 
      aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span id="profile-name"></span>
              </a>
              <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-4">
                <a href="" class="dropdown-item" data-toggle="modal" data-target="#basicExampleModal">
                  Profile
                </a>
                <a class="dropdown-item" href="<?=PATH?>/login/logout.php">Log out</a>
              </div>
          </li>
      </ul>
  </div>  
</nav>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
      <!-- content here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  let accountData;
  const modalBody = document.getElementById('modalBody');
  const nameDiv = document.getElementById('profile-name');

  $('#basicExampleModal').on('hidden.bs.modal', function () {
    showProfile(accountData)
  })

  async function submitChangePass() {
    const old_pass = document.getElementById('old_pass');
    const new_pass = document.getElementById('new_pass');
    const confirm_pass = document.getElementById('confirm_pass');
    const error_div = document.getElementById('change-pass-error');
    const message_div = document.getElementById('change-pass-message');

    const old_pass_val = old_pass.value,
          new_pass_val = new_pass.value,
          confirm_pass_val = confirm_pass.value;

    if (old_pass_val === '' || new_pass_val === '' || confirm_pass_val === '') {
      error_div.innerHTML = "Please Fill In all Info";
      return;
    }
    if (new_pass_val !== confirm_pass_val) {
      error_div.innerHTML = "Confirm Password not Matching";
      return;
    }
    try {
      const res = await axios.post('http://localhost/teachers-toolkit-app/server/user/changePass', {
        old_pass: old_pass_val, new_pass: new_pass_val, id: <?=$_SESSION["user_id"]?>
      })
      const data = res.data
      message_div.innerHTML = data.message;
      if (data.result === 1) {
        old_pass.value = '';
        new_pass.value = '';
        confirm_pass.value = '';
        error_div.innerHTML = '';
      }
    } catch (err) {
      console.log(err); 
      error_div.innerHTML = err.response.data.message;
    }
    
  }

  function showChangePass() {
    modalBody.innerHTML = `
    <h2 style="text-align: center; margin: 1em 0;">Change Password</h2>
    <form id="change-pass-form">
      <div class="form-group">
        <div class="row">
          <div class="col">
            <div class="md-form mt-0">
              <input type="password" class="form-control" placeholder="old password" id="old_pass">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <div class="md-form mt-0">
              <input type="password" class="form-control" placeholder="new password" id="new_pass">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <div class="md-form mt-0">
              <input type="password" class="form-control" placeholder="confirm new password" id="confirm_pass">
            </div>
          </div>
        </div>
      </div>
      <div id="change-pass-error" style="color: red;"></div>
      <div id="change-pass-message" style="color: lime;"></div>
      <button type="button" class="btn btn-warning" id="submit-change-pass">submit</button>
    </form>
    `;
    const submitButton = document.getElementById('submit-change-pass');
    submitButton.addEventListener('click', submitChangePass);
  }

  function showProfile(account) {
    modalBody.innerHTML = `
    <h2 style="text-align: center; margin: 1em 0;">Teacher Account</h2>
    <div style="display: flex; justify-content: center;">
      <div style="width: 35%; font-weight: bold;">
        <p>id</p>
        <p>Name</p>
        <p>Email</p>
        <p>Phone</p>
      </div>
      <div style="width: 35%; ">
        <p>${account.user_id}</p>
        <p>${account.firstname} ${account.middlename} ${account.lastname}</p>
        <p>${account.email}</p>
        <p>${account.phone_no}</p>
      </div>
    </div>
    <p style="text-align:center; cursor:pointer;" class="my-2 text-primary" id="change-pass" onClick="showChangePass()">change password</p>
    `;
  }

  // fetch current account
  axios.get('http://localhost/teachers-toolkit-app/server/teacher/findOne/<?=$_SESSION['account_id']?>')
    .then(data => {
      data = data.data;
      if (data.result === 1) {
        accountData = data.data;
        showProfile(accountData);
        
        nameDiv.innerText = accountData.firstname;
      } else {
        modalBody.innerHTML = 'failed to get account information';
        nameDiv.innerText = '<?=$_SESSION["user_id"]?>';
      }
    })
    .catch(err => console.log(err));
</script>