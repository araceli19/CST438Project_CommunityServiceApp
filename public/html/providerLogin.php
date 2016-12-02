<!DOCTYPE html>
<html>
    <head>
        <title>Community Service Finder </title>

      <link rel="stylesheet" href="home.css">
    </head>
    <body background = "img/park.jpg">
        <header>
        <div id = "header">
        <h1> Community Service Finder </h1>
        </div>
        </header>
        <nav>
        <a href= "providerLogin.html" id="currentPage">Home</a>
        <a href= "../../index.php">Home</a>
        <a href= "search.php">Services</a>
        <a href= "contactUs.html">Contact Us</a>
        </nav>
       <div class="tables">
        <table>
          <tr>
            <th>Post</th>
            <th># Students</th>
            <th>Applications</th>
          </tr>
          <tr>
            <td>name of post</td>
            <td>current # of volunteers</td>
            <td><a href="https://www.google.com/"># of applications</a></td>
          </tr>

        </table>
        </div>



        <!-- Trigger/Open the modal -->
        <div class="addPost">
             <button class="add" id="openPost">+</button>

                <!-- The Modal -->
        <div id="myPost" class="modal">


              <!-- post content -->
              <div class="post-content">
                  <div class="modal-header">
                      <span class="close">x</span>
                      <h2>Create New Post</h2>
                    </div>
                    <div class="modal-body">
                      <p>Post Name: <input type="text" name="postname"/> </p>
                      <p>Location: <input type="text" name="location"/>  </p>
                      <p>Description: <input type="text" name="description"/> </p>
                      <p>Category: <input type="text" name="category"/> </p>
                      <p>Students Needed: <input type="text" name="studentcount"/> </p>
                    </div>
                    <div class="modal-footer">
                      <h3></h3>
                    </div>
              </div>

           </div>
       </div>

       <script>
// Get the modal
var modal = document.getElementById('myPost');

// Get the button that opens the modal
var btn = document.getElementById("openPost");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    </body>
</html>
