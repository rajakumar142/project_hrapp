<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<style>

.menu, .menu-bar, .menu-bar2, .menu-bar3 , .menu-bar4 {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    list-style-type: none;
    margin: 0;
    padding: 0;
    background: #fff;
    z-index:10;  
    overflow:hidden;
    box-shadow: 2px 0 18px rgba(0, 0, 0, 0.16);
}
.menu{
background:#267fdd;
}
.menu li a{
  display: block;
  height: 5em;
  width: 5em;
  line-height: 5em;
  text-align:center;
  color: #dae1ef;
  position: relative;
  transition: background 0.1s ease-in-out;
}

.menu li a i{
	padding-top:20px;
	font-size:30px;
}

.menu li:last-child{
    
    position: absolute;
    bottom: 0;
} 
.menu-bar, .menu-bar2, .menu-bar3, .menu-bar4{
    overflow:hidden;
    left:5em;
    z-index:5;
    width:0;
    height:0;
    transition: all 0.1s ease-in-out;
}

.menu-bar li a, .menu-bar2 li a, .menu-bar3 li a, .menu-bar4 li a {
    display: block;
    height: 3em;
    line-height: 3em;
    color: #72739f;
    text-decoration: none;
    position: relative;
    font-family: verdana;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    transition: background 0.1s ease-in-out;
    text-align: left;
	padding-left:20px;
}


.para{
    color:#033f72;
    padding-left:100px;
    font-size:3em;
    margin-bottom:20px;
}

.open{
    width:15em;
    height:100%;
    margin-left:22px;
}

li button {
    background: none;
    border: 0px;
    margin: 0 auto;
    display: block;
    text-align: left;
    cursor: pointer;
    font-size: 15px;
    padding: 5px 20px;
    border-bottom: 1px solid #e5e5e5 !important;
    width: 100%;
    height: 3em;
    color: #7c7b7b;
    font-weight: 500;
    font-size: 16px;
    font-family: verdana;
}

.dropdown-container {
    display: none;
    background-color: #fff;
    padding: 20px;
    height: 140px;
}

.dropdown-container a {
    display: block;
    color: #242424;
    padding: 10px 16px;
    list-style: none;
    text-decoration: none;
    font-size: 14px;
}

.fa-caret-down {
  float: right;
  padding-right: 8px;
}

@media all and (max-width: 500px) {
    .container{
        margin-top:100px;
    }
    .menu{
        height:5em;
        width:100%;
    }
    .menu li{
        display:inline-block;
        float:left;
    }
    .menu-bar li a{
        width:100%;
    }
    .menu-bar{
        width:100%;
        left:0;
        height:0;
    }
    .open{
        width:100%;
        height:auto;
        
    }
    .para{
    padding-left:5px;
}  
}
@media screen and (max-height: 34em){
  .menu li,
  .menu-bar {
    font-size:70%;
  }
}
@media screen and (max-height: 34em) and (max-width: 500px){
  .menu{
        height:3.5em;
    }
}
</style>

<ul class="menu">
  <li title="dash"><a href="rdash.php" class="dash"><i class="fa-solid fa-gauge-simple"></i></a></li>
  <li title="Profile"><a href="rprofile.php" ><i class="fa-solid fa-users"></i></a></li>
  <li title="leave"><a href="#" class="menu-button"><i class="fa-solid fa-calendar-days"></i></a></li>
  <li title="review"><a href="#" class="menu-button4"><i class="fa-solid fa-file-pen"></i></a></li>
  <li title="salary"><a href="rsalary.php" ><i class="fa-solid fa-money-bill"></i></a></li>

  
  <li title="Logout"><a href="login.html" class="Logout"><i class="fa-solid fa-right-from-bracket"></i></a></li>
 
</ul>
    
<ul class="menu-bar">
	<li><a href="rholiday.php">Holidays</a></li>
    <li class="dropdown-btn">
		<button>Leaves 
			<i class="fa fa-caret-down"></i>
		</button>
	</li>
	  <div class="dropdown-container active">
      <a href="rleavehistory.php">Leave History</a>
		<a href="rapplyleave.php"> Apply Leave</a>
		<a href="rapplypermission.php"> Apply Premission</a>
	  </div>
   
</ul>

<ul class="menu-bar2">
	<li class="dropdown-btn">
		<button>Profile 
			<i class="fa fa-caret-down"></i>
		</button>
	</li>
	  <div class="dropdown-container active">
		<a href="#"><i class="fa-regular fa-eye"></i> View</a>
		<a href="#"><i class="fa-solid fa-user-plus"></i> Add</a>
        <a href="#"><i class="fa-solid fa-trash"></i></i> Delete</a>
	  </div>
      
</ul>

<ul class="menu-bar3">
	<li class="dropdown-btn">
		<button>Department 
			<i class="fa fa-caret-down"></i>
		</button>
	</li>
	  <div class="dropdown-container active">
		<a href="#"><i class="fa-solid fa-user-plus"></i> Add</a>
        <a href="#"><i class="fa-solid fa-trash"></i></i> Manage</a>
	  </div>
      
</ul>

<ul class="menu-bar4">
	<li class="dropdown-btn">
		<button>Review 
			<i class="fa fa-caret-down"></i>
		</button>
	</li>
	  <div class="dropdown-container active">
		<a href="approveleave.php"></i> Leave</a>
        <a href="approvepermission.php"></i> Permmission</a>
	  </div>

      <li class="dropdown-btn">
		<button>Overview 
			<i class="fa fa-caret-down"></i>
		</button>
	</li>
	  <div class="dropdown-container active">
		<a href="#"></i> Leave</a>
        <a href="#"></i> Permmission</a>
        <a href="#"></i> Attendance</a>
        <a href="#"></i> Who is in?</a>
	  </div>
      
</ul>

<script>
$(document).ready(function() {
    $(".menu-button").click(function() {
        $(".menu-bar2").removeClass("open");
        $(".menu-bar").toggleClass("open");
    });

    $(".menu-button2").click(function() {
        $(".menu-bar").removeClass("open");
        $(".menu-bar2").toggleClass("open");
    });
    $(".menu-button3").click(function() {
        $(".menu-bar").removeClass("open");
        $(".menu-bar3").toggleClass("open");
    });
    $(".menu-button4").click(function() {
        $(".menu-bar").removeClass("open");
        $(".menu-bar4").toggleClass("open");
    });
});

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
</script>
	