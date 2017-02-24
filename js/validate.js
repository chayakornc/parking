function Validate() 
{
   var val = document.getElementById('license').value;

   if (!val.match(/^[ก-ฮ0-9]+$/)) 
    {
        alert('กรุณาตรวจสอบการกรอกข้อมูล');
        return false;
    }

    return true;
}

function ValidateNumber() 
{
   var val = document.getElementById('recive').value;

   if (!val.match(/^[0-9]+$/)) 
    {
        alert('กรุณากรอกตัวเลขเท่านั้น');
        return false;
    }

    return true;
}