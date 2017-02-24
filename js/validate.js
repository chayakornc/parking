function Validate() 
{
   var val = document.getElementById('inputEmail').value;

   if (!val.match(/^[ก-ฮ0-9]+$/)) 
    {
        alert('กรุณาตรวจสอบการกรอกข้อมูล');
        return false;
    }

    return true;
}