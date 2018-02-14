<?php
     print_r($_POST);
?>
<script language="javascript">
function check(frm) {
   var inputs = frm.getElementsByTagName('input');
   for(var i = 0 ; i < inputs.length ; i++){
     input = inputs[i];
     if(input.type == 'checkbox'){
          if (input.checked){
               return true;
          };
     };
   };
   alert('กรุณาเลือกอย่างน้อย 1 รายการ');
   return false;
}
</script>

<body>
<form id="form1" onSubmit="return check(this)" name="form1" method="post" >
<input type="checkbox" name="chk[]" />
<input type="submit" />
</form>