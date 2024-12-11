// alert("Bienvenidos a mi Empresa");
const app=document.getElementById('typewriter');
const typewriter = new Typewriter(app,{
loop:true,
delay:75
});

typewriter
.typeString('2600 mts mas cerca de las estrellas')
.pauseFor(200)
.start();

function showDiv(element)
{
    console.log(element.value)
    document.getElementById('Owner').style.display = element.value == "Owner" ? 'block' : 'none';
    document.getElementById('Doc').style.display = element.value == "Veterinario" ? 'block' : 'none';
    document.getElementById('Staff').style.display = element.value == "Staff" ? 'block' : 'none';
    document.getElementById('Admin').style.display = element.value == "Admin" ? 'block' : 'none';
}

function deleteUser(userId, personId){
  console.log('deleting user', userId, ' - ', personId)
  $.post("/operations/deleteRegisterPerson.php", {userId: userId, personId: personId});
return false;
}