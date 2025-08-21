
    function showSection(sectionId, linkElement) {
      // Hide all sections
      document.querySelectorAll('.main > div').forEach(div => {
        div.style.display = 'none';
      });

      // Show selected section
      document.getElementById(sectionId).style.display = 'block';

      // Remove 'active' from all links
      document.querySelectorAll('.nav a').forEach(a => a.classList.remove('active'));

      // Add 'active' to clicked link
      linkElement.classList.add('active');
    }

    function toggleSubmenu(submenuId) {
      const submenu = document.getElementById(submenuId);
      submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    }
  


//login
function login()
{
    var mail = document.getElementById("mail").value
    var pass = document.getElementById("pass").value

    if( mail == "Admin@gmail.com" && pass == "Admin@123")
    {
        window.location.href = "dashboard.php"
    }
    else
    {
        Swal.fire({
            position: "middle-center",
            icon: "error",
            title: "Please enter the valid mail or password",
            showConfirmButton: false,
            timer: 1500
          });
    }

}




  
